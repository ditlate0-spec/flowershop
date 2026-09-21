<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramNotifier
{
    protected string $token;
    protected string $chatId;

    public function __construct()
    {
        $this->token  = config('services.telegram.bot_token');
        $this->chatId = config('services.telegram.chat_id');
    }

    public function send(string $text, ?string $parseMode = 'HTML'): bool
    {
        if (empty($this->token) || empty($this->chatId)) {
            Log::warning('Telegram: token или chat_id не заданы в .env');
            return false;
        }

        try {
            $response = Http::timeout(10)->post(
                "https://api.telegram.org/bot{$this->token}/sendMessage",
                [
                    'chat_id'    => $this->chatId,
                    'text'       => $text,
                    'parse_mode' => $parseMode,
                ]
            );

            if (!$response->successful()) {
                Log::error('Telegram send failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('Telegram send exception: ' . $e->getMessage());
            return false;
        }
    }

    public function sendOrder(array $order): bool
    {
        $id       = $order['id'] ?? null;
        $country  = $order['country'] ?? 'RU';
        $currency = $order['currency'] ?? 'RUB';

        // Символы валют
        $symbols = [
            'RUB' => '₽',
            'USD' => '$',
            'EUR' => '€',
            'BYN' => 'Br',
            'KZT' => '₸',
        ];
        $symbol = $symbols[$currency] ?? '₽';

        // Флаги стран
        $flags = [
            'RU' => '🇷🇺', 'US' => '🇺🇸', 'EU' => '🇩🇪',
            'BY' => '🇧🇾', 'KZ' => '🇰🇿',
        ];
        $flag = $flags[$country] ?? '🌍';

        // Форматирование суммы в рублях
        $fmtRub = fn($v) => number_format($v, 0, '.', ' ') . ' ₽';

        // Состав заказа — в рублях
        $items = '';
        foreach ($order['items'] as $i => $item) {
            $n   = $i + 1;
            $sum = $item['price'] * $item['qty'];
            $items .= "{$n}. {$item['name']} — {$item['qty']} шт × "
                    . $fmtRub($item['price'])
                    . " = <b>" . $fmtRub($sum) . "</b>\n";
        }

        $subtotal = $order['subtotal'] ?? 0;
        $discount = $order['discount'] ?? 0;
        $total    = $order['total'] ?? 0;

        $discountLine = $discount > 0
            ? "\n💸 Скидка: <b>−" . $fmtRub($discount) . "</b>"
            : '';

        $comment = !empty($order['comment'])
            ? "\n\n💬 <b>Комментарий:</b>\n" . e($order['comment'])
            : '';

        $header = $id
            ? "🌸 <b>НОВЫЙ ЗАКАЗ №{$id}</b>"
            : "🌸 <b>НОВЫЙ ЗАКАЗ</b>";

        $text  = $header . "\n";
        $text .= "━━━━━━━━━━━━━━━━━━━\n\n";
        $text .= "👤 <b>Имя:</b> " . e($order['name']) . "\n";
        $text .= "📞 <b>Телефон:</b> " . e($order['phone']) . "\n";
        $text .= "📍 <b>Адрес:</b> " . e($order['address']) . "\n";
        $text .= "🌍 <b>Страна:</b> {$flag} {$country}\n";

        if ($currency !== 'RUB') {
            $text .= "💱 <b>Клиент видел цены в:</b> {$currency} ({$symbol})\n";
        }

        $text .= $comment . "\n\n";
        $text .= "━━━━━━━━━━━━━━━━━━━\n";
        $text .= "🛒 <b>Состав заказа (в ₽):</b>\n";
        $text .= $items . "\n";
        $text .= "━━━━━━━━━━━━━━━━━━━\n";
        $text .= "💰 Подытог: " . $fmtRub($subtotal);
        $text .= $discountLine . "\n";
        $text .= "🧾 <b>ИТОГО: " . $fmtRub($total) . "</b>\n\n";
        $text .= "🕐 " . now()->format('d.m.Y H:i') . " МСК";

        return $this->send($text);
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\TelegramNotifier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, TelegramNotifier $tg)
    {
        $data = $request->validate([
            'name'     => 'required|string|min:2|max:100',
            'phone'    => ['required', 'string', function ($attribute, $value, $fail) {
                $digits = preg_replace('/\D/', '', $value);
                if (strlen($digits) < 10 || strlen($digits) > 15) {
                    $fail('Введите корректный номер телефона');
                }
            }],
            'address'  => 'required|string|min:5|max:255',
            'comment'  => 'nullable|string|max:500',
            'country'  => 'nullable|string|size:2',
            'currency' => 'nullable|string|size:3',
            'items'    => 'required|array|min:1',
            'items.*.name'  => 'required|string|max:255',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.qty'   => 'required|integer|min:1|max:99',
            'items.*.img'   => 'nullable|string|max:500',
            'subtotal' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'total'    => 'required|numeric|min:0',
        ]);

        // Временный номер заказа (без БД)
        $orderId = random_int(1000, 9999);

        // Отправляем в Telegram
        $sent = $tg->sendOrder(array_merge($data, ['id' => $orderId]));

        if (!$sent) {
            return response()->json([
                'ok'    => false,
                'error' => 'Не удалось отправить заказ. Позвоните нам.',
            ], 500);
        }

        return response()->json([
            'ok'       => true,
            'order_id' => $orderId,
            'message'  => "Заказ №{$orderId} принят! Перезвоним в течение 10 минут.",
        ]);
    }
}
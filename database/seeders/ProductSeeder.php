<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Пионовый микс', 'description' => 'Пионы, гортензия, эвкалипт', 'price' => 4900, 'image' => 'images/1.png', 'badge' => 'Хит', 'size' => 'Средний, 45 см', 'life' => '14 дней'],
            ['name' => 'Розовый рассвет', 'description' => 'Розы, эустома, зелень', 'price' => 3700, 'image' => 'images/2.png', 'size' => 'Средний, 40 см', 'life' => '12 дней'],
            ['name' => 'Полевой сбор', 'description' => 'Ромашки, лаванда, злаки', 'price' => 2800, 'image' => 'images/3.png', 'badge' => 'Новинка', 'size' => 'Компактный, 35 см', 'life' => '10 дней'],
            ['name' => 'Нежность', 'description' => 'Пионы, ранункулюсы', 'price' => 5400, 'old_price' => 6200, 'image' => 'images/4.png', 'size' => 'Большой, 50 см', 'life' => '14 дней'],
            ['name' => 'Закат', 'description' => 'Герберы, розы, хризантемы', 'price' => 3200, 'image' => 'images/5.png', 'size' => 'Средний, 45 см', 'life' => '12 дней'],
            ['name' => 'Комплимент', 'description' => 'Мини-букет в крафте', 'price' => 1900, 'image' => 'images/1.png', 'badge' => 'Хит', 'size' => 'Мини, 25 см', 'life' => '7 дней'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
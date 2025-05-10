<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем склад
        $warehouse = Warehouse::firstOrCreate(['name' => 'Основной склад']);

        // Создаем продукты
        $products = Product::factory()->count(5)->create();

        foreach ($products as $product) {
            // Добавим остатки на складе
            $product->stock()->create([
                'warehouse_id' => $warehouse->id,
                'stock' => rand(10, 100)
            ]);
        }

        // Создаем заказы
        for ($i = 0; $i < 10; $i++) {
            $order = Order::create([
                'customer' => 'Покупатель ' . ($i + 1),
                'status' => ['active', 'completed', 'canceled'][rand(0, 2)],
                'warehouse_id' => $warehouse->id,
                'completed_at' => now()->subDays(rand(0, 10)),
            ]);

            // Добавим товары в заказ
            $orderItems = $products->random(rand(1, 3));
            foreach ($orderItems as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'count' => rand(1, 5),
                ]);
            }
        }
    }
}

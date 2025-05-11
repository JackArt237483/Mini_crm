<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class ProductWithStockSeeder extends Seeder
{
    /**
     * Заполняем товары с остатками по складам.
     */
    public function run(): void
    {
        // Получаем уже существующий склад
        $warehouse = Warehouse::where('name', 'Основной склад')->first();

        if (!$warehouse) {
            throw new \Exception('Склад "Основной склад" не найден. Запусти сначала WarehouseSeeder.');
        }

        // Массив товаров
        $products = [
            ['name' => 'Пирог', 'price' => 12],
            ['name' => 'Iphone', 'price' => 150],
            ['name' => 'Хлеб', 'price' => 5],
            ['name' => 'Macbook Pro', 'price' => 2000],
        ];

        // Создаём товары и остатки
        foreach ($products as $productData) {
            $product = Product::create($productData);

            Stock::create([
                'product_id' => $product->id,
                'warehouse_id' => $warehouse->id,
                'stock' => rand(10, 100),
            ]);
        }
    }
}

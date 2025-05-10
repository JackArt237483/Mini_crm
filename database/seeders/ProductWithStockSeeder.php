<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class ProductWithStockSeeder extends Seeder
{
    /**
     * Заполняем товары с остатками по складам.
     *
     * @return void
     */
   public function run()
    {
        // Получаем склад
        $warehouse = Warehouse::firstOrCreate(['name' => 'Основной склад']);

        // Массив товаров для добавления
        $products = [
            ['name' => 'Пирог', 'price' => 12],
            ['name' => 'Iphone', 'price' => 150],
            // Добавь другие товары по необходимости
        ];

        // Добавляем товары с остатками на склад
        foreach ($products as $productData) {
            $product = Product::create($productData);

            Stock::create([
                'product_id' => $product->id,
                'warehouse_id' => $warehouse->id,
                'stock' => 30,
            ]);
        }
    }
}

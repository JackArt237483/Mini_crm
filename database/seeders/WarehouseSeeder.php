<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Заполнить таблицу складов.
     *
     * @return void
     */
    public function run()
    {
         Warehouse::insert([
            ['name' => 'Основной склад'],
        ]);
    }
}

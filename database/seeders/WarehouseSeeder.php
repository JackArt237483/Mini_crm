<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Заполнить таблицу складов.
     */
    public function run(): void
    {
        Warehouse::firstOrCreate([
            'name' => 'Основной склад',
        ]);
    }
}

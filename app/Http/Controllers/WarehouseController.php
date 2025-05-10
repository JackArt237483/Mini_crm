<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\JsonResponse;


class WarehouseController extends Controller
{
    /**
     * Получить список всех складов
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Получаем все склады
        $warehouses = Warehouse::all();

        // Возвращаем в формате JSON
        return response()->json([
            'data' => $warehouses
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Получить список заказов с фильтрами и пагинацией.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        // Параметры фильтрации (например, статус заказа, дата)
        $query = Order::query();

        // Фильтрация по статусу
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        // Фильтрация по заказчику
        if ($request->has('customer')) {
            $query->where('customer', 'like', '%' . $request->input('customer') . '%');
        }

        // Фильтрация по дате завершения
        if ($request->has('completed_at')) {
            $query->where('completed_at', '=', $request->input('completed_at'));
        }

        // Пагинация (по умолчанию 10 элементов на странице, можно передавать через запрос)
        $orders = $query->paginate($request->input('per_page', 10));

        return response()->json([
            'data' => $orders
        ]);
    }
}

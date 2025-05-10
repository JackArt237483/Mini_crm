<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Получить список товаров с остатками по складам
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::with(['stocks.warehouse'])->get();

        return response()->json([
            'data' => $products
        ]);
    }
}

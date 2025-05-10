<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Таблица
    protected $table = 'products';

    // Поля для массового присваивания
    protected $fillable = ['name', 'price'];

    // Связь с остатками товара
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'product_id');
    }

    // Связь с позициями товаров в заказах
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

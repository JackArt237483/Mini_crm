<?php

// Модель заказа товара 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'count'
    ];

    //Связь Заказ принадлежит складу
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
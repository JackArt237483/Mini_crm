<?php
// Модель заказа 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'customer',
        'warehouse_id',
        'status',
        'completed_at',
        'created_at'
    ];
    //Связь Один заказ содержит много позиций (OrderItem)
    public function orderItem(){
        return $this->hasManyO(OrderItem::class);
    }
    //Связь Заказ принадлежит складу
    public function wareHouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
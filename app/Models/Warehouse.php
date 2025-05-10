<?php
// Модель склада 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    // таблица склада
    protected $table = 'warehouses'; 
    // Связь с остатками на складе
    protected $fillable = ['name'];
    //Связь Один заказ содержит много позиций (OrderItem)
    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
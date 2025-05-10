<?php
// Модель для текущего количество товара	
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = [
        'stock',
        'product_id',
        'warehouse_id'
    ];
    //К какому товару относится движение
    public function product(){
        return $this->belongsTo(Product::class);
    }
    //Привязка к складу
    public function wareHouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
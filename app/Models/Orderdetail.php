<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_sales_quantity',
    ];
    public function Order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function Producr(){
        return $this->belongsTo(Producr::class, 'product_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orders_details';
    protected $primaryKey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'qty',
        'amount',
        'total',
        'created_at',
        'updated_at',
    ];

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}



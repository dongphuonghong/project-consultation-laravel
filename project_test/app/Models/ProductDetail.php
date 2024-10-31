<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $tablbe = 'product_details';
    protected $primaryKey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'id',
        'product_id',
        'color',
        'size',
        'qty',
        'created_at',
        'updated_at',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');//quan he 1-1
    }
}

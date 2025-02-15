<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $tablbe = 'product_images';
    protected $primaryKey = 'id';
    protected $quarded = [];

    protected $fillable = [
        'id',
        'product_id',
        'path',
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');//quan he 1-1
    }
}

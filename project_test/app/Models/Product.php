<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $tablbe = 'products';
    protected $primaryKey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'id',
        'brand_id',
        'product_category_id',
        'name',
        'description',
        'content',
        'price',
        'qty',
        'discount',
        'weight',
        'sku',
        'featured',
        'tag',
        'created_at',
        'updated_at',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');//quan he 1-1
    }
    public function productCategory(){
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');//quan he 1-1
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productDetails(){
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }
    public function productComments(){
        return $this->hasMany(ProductComment::class,'product_id','id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}

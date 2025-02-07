<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $tablbe = 'product_categories';
    protected $primaryKey = 'id';
    protected $quarded = [];

    public function product(){
        return $this->hasMany(Product::class,'product_category_id','id');//quan he 1-n
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    protected $tablbe = 'product_comments';
    protected $primaryKey = 'id';
    protected $quarded = [];

    protected $fillable = [
    'id',
    'product_id',
    'user_id',
    'email',
    'name',
    'messages',
    'rating',
    'created_at',
    'updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');//quan he 1-1
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

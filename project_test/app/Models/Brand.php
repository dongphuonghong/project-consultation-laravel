<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $tablbe = 'brands';
    protected $primaryKey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}

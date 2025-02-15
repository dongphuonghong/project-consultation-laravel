<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $tablbe = 'orders';
    protected $primaryKey = 'id';
    protected $quarded = [];

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'company_name',
        'country',
        'street_address',
        'postcode_zip',
        'town_city',
        'email',
        'phone',
        'payment_type',
        'status',
        'created_at',
        'updated_at',
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}

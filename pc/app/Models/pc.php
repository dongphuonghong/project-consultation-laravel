<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pc extends Model
{
    use HasFactory;
    protected $fillable = [
        'pc_name',
        'isbn_no',
        'pc_price',
    ];
}
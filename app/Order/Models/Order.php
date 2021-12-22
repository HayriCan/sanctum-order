<?php

namespace App\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    protected $fillable = [
        'customerId',
        'items',
        'total',
    ];
}

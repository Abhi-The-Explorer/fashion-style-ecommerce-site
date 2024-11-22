<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class OrderStatus extends Model
{
    protected $table = 'order_status'; // Specify the table name if not the plural form of the model

    protected $fillable = [
        'order_id',
        'payment_status',
        'order_status',
        'user_id',
    ];

    // Define the relationship to the OrderDetail model
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_id', 'order_id');
    }
}
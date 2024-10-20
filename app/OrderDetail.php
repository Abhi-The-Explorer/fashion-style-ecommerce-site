<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Specify the table name if different from the pluralized model name
    protected $table = 'order_details';

    // Specify the fillable properties for mass assignment
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'product_name',
        'quantity',
        'price',
        'total_amount_per_product',
        'image',
        'order_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with the OrderStatus model
    public function OrderStatus()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'order_id');
    }

}

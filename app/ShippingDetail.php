<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    // Define the table name if it doesn't follow Laravel's convention



    //     protected $fillable = [
    //         'user_id',
    //         'full_name',
    //         'country',
    //         'address_line',
    //         'city',
    //         'state',
    //         'postcode',
    //         'phone',
    //         'email',
    //         'additional_info',
    //         'total_amount', 
    //         'created_at',
    //         'updated_at',
    //         'order_id',
    
    // ];

    protected $table = 'shipping_details'; 

    protected $guarded= ['id'];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_id', 'order_id');
    }

}

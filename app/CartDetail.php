<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{

        // Specify the table name if it doesn't follow Laravel's naming convention
        protected $table = 'cart_details';
    
        // By default, the primary key is 'id' and auto-increments
        protected $primaryKey = 'id';
    
        // Define the attributes that are mass assignable
        protected $fillable = [
            'user_id',
            'name',
            'product_name',
            'price',
            'quantity',
            'image',
            'product_id',
            'total_amount_per_product',
            
        ];
    
        // Define relationships if needed
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    
        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id');
        }
    }
    


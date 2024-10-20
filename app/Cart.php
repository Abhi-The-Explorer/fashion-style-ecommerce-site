<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts'; // specify the table name if not following convention

    protected $fillable = ['user_id']; // Specify fillable fields

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class); // Assuming you have a CartDetail model
    }
}
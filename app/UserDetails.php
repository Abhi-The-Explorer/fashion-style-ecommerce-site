<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details'; 

    protected $fillable = [
        'user_id',
        'country',
        'street_address',
        'city',
        'state',
        'phone',
        'image',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

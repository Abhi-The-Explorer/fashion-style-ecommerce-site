<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTotal extends Model
{


    // Specify the table associated with the model
    protected $table = 'user_totals';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'grand_total',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

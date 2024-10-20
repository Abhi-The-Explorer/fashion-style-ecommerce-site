<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Define the table name
    protected $table = 'feedback';

    // Allow mass assignment for these fields
    protected $fillable = ['user_id', 'name', 'email', 'contact_no', 'message'];

    

    // Define the relationship with the User model (assuming a user_id foreign key)
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}

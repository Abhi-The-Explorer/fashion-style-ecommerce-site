<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $admin;
    protected $table = 'admins'; // Optional if the table name follows Laravel conventions
    protected $fillable = ['name', 'email', 'image']; // Add your other fields here
}

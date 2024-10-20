<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    // Define the table name
    protected $table = 'teammembers';

    // Allow mass assignment for these fields
    protected $fillable = ['id', 'name', 'position', 'image'];

    
}

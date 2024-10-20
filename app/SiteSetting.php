<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    // Protect the 'id' field from mass assignment
    protected $guarded = ['id'];

    // Specify the table name if necessary (if the table name does not follow Laravel's plural naming convention)
    protected $table = 'site_settings';

    // Set or update a setting based on the key
    public static function set($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}




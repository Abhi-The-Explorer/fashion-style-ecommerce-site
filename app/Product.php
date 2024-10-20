<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'category',
        'price',
        'qty',
        'created_by',
        'description',
    ];

    
public function category()
{
    return $this->belongsTo(Category::class);
}

public function admin()
{
    return $this->belongsTo(Admin::class, 'created_by');
}

}



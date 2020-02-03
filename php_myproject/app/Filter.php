<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table = 'products';
 
    protected $fillable = [
        'brandId',
        'menuId',
        'submenuId',
    ];
}

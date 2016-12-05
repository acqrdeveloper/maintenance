<?php

namespace maintenance;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "Product";
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'image',
    ];
    protected $hidden=[
        'id',
        'state',
    ];
}

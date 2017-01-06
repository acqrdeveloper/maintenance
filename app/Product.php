<?php

namespace maintenance;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
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

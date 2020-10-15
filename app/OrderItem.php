<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
     protected $fillable = [
        'name',
       	'price',
        'quantity',
        'product_id',
        'order_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}

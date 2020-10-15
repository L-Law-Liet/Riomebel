<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'name',
       	'email',
        'phone',
        'payment',
        'city_id',
        'sberbank_order_id',
        'adress',
        'delivery'
    ];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}

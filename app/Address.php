<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $fillable = [
        'name',
        'city_id'
    ];
    public $timestamps = false;

    public function relCity(){
        return $this->belongsTo(City::class, 'city', 'id');
    }
}

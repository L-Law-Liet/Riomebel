<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    public function relCity(){
        return $this->belongsTo(City::class, 'city', 'id');
    }
}

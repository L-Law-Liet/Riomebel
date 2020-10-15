<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    public function contacts() {
        return $this->hasMany(Contact::class, 'city');
    }
}

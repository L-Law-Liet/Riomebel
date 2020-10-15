<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'category_id',
		'slug'
    ];
	
    function setSlugAttribute(){
        $this->attributes['slug'] = Str::slug($this->name, '_');
    }
	
    public function products() {
        return $this->hasMany(Product::class);
    }
}

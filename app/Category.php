<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];
	
    function setSlugAttribute(){
        $this->attributes['slug'] = Str::slug($this->name, '_');
    }
	
    public function subcategory() {
        return $this->hasMany(SubCategory::class);
    }

}

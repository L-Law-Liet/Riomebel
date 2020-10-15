<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{
     protected $fillable = [
         'name',
         'discount',
         'new_price',
         'old_price',
         'image',
         'images',
         'slug',
         'manufactor_id',
         'subcategory_id',
         'quantity',
         'color_id',
         'size_id'
    ];
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
    public function manufactor()
    {
        return $this->belongsTo('App\Manufactor');
    }
    function setSlugAttribute(){
        $this->attributes['slug'] = Str::slug($this->name, '_').'_'.random_int(10, 99);
    }
    public function getResizedImageAttribute()
    {
       $pattern = '/(\w+)\/(\w+)\/(\w+).(\w+)/i';
		// $pattern = '/[a-zA-Z0-9]+';
        $replacement = '$1/$2/$3-resize-300.$4';
        return  preg_replace($pattern, $replacement, $this->image);
    }
}

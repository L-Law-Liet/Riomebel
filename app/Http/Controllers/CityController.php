<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
     public function changeCity(Request $request)
    {
    	$id = $request->city;
    	$request->session()->put('city_id', $id);
    	session(['modalShowed' => true]);

       return back();
    }
}

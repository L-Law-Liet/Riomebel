<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Product};

class ViewController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::whereIn('city_id', [session('city_id', \App\Contact::first()->id), null])->limit(10)->get();
        $title = 'RIO';
        return view('index', compact('products', 'categories', 'title'));
    }

    public function favorite()
    {
        $title = 'Избранное';
        return view('favorite', compact('title'));
    }

    public function box()
    {
        $title = 'Корзина';
        return view('box', compact('title'));
    }
}

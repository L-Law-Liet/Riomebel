<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index($page, $category_id, Request $request, $subcategory_id = null){
        $products = Product::whereIn('city_id', [session('city_id', \App\Contact::first()->id), null]);
        if ($subcategory_id){
            $products = $products->where('subcategory_id', $subcategory_id);
        }
        else {
            $products = $products->whereIn('subcategory_id', Category::find($category_id)->subcategory->pluck('id'));
        }
        $page = $request->get('page');
        if ($request->get('a')) {
            $a = $request->get('a');
            $colors = [];
            $sizes = [];
            $manufactors = [];
            $sort = null;
            foreach ($a as $item) {
                if ($item['name'] == 'color') {
                    $colors[] = $item['value'];
                }
                if ($item['name'] == 'size') {
                    $sizes[] = $item['value'];
                }
                if ($item['name'] == 'manufactor') {
                    $manufactors[] = $item['value'];
                }
                if ($item['name'] == 'in_stock') {
                    $products = $products->where('quantity', '>=', 1);
                }
                if ($item['name'] == 'from' && $item['value']) {
                    $products = $products->where('new_price', '>=', $item['value']);
                }
                if ($item['name'] == 'till' && $item['value']) {
                    $products = $products->where('new_price', '<=', $item['value']);
                }
                if ($item['name'] == 'sort' && $item['value']) {
                    $sort = $item['value'];
                }
            }
            if (count($sizes) > 0) {
                $products = $products->whereIn('size_id', $sizes);
            }
            if (count($colors) > 0) {
                $products = $products->whereIn('color_id', $colors);
            }
            if (count($manufactors) > 0) {
                $products = $products->whereIn('manufactor_id', $manufactors);
            }
            if ($sort) {
                switch ($sort) {
                    case 'price':
                        $products = $products->orderBy('new_price');
                        break;
                    case 'price_desc':
                        $products = $products->orderBy('new_price', 'desc');
                        break;
                    case 'az':
                        $products = $products->orderBy('name');
                        break;
                }
            }
        }
        $products = $products->paginate(12);
        return view('products', compact('products', 'page', 'category_id', 'subcategory_id'))->render();
    }
}

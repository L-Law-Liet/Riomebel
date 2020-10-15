<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Color, Product, Size, SubCategory};

class ProductController extends Controller
{
    public function product($id)
    {
        $product = Product::where('slug', $id)->first();
        $product->images = json_decode($product->images);
        $description = $product->description;
        $title = $product->name;
        return view('product', compact('product', 'description', 'title'));
    }

    public function category($category_slug, $subcategory_slug = null)
    {
        $products = Product::whereIn('city_id', [session('city_id', \App\Contact::first()->id), null]);
        $category_id = Category::where('slug', $category_slug)->first()->id;
        if ($subcategory_slug){
            $subcategory_id = SubCategory::where('slug', $subcategory_slug)->first()->id;
            $title = SubCategory::where('slug', $subcategory_slug)->first()->name;
            $data['products'] = $products->where('subcategory_id', $subcategory_id)->paginate(12);
        }
        else {
            $title = Category::where('slug', $category_slug)->first()->name;
            $data['products'] = $products->whereIn('subcategory_id', Category::where('slug', $category_slug)->first()->subcategory->pluck('id'))->paginate(12);
        }
        $page = 1;
				
        return view('category', compact('category_id', 'subcategory_id', 'page', 'title'), $data);
    }

    public function search(Request $request)
    {
        $products = Product::whereIn('city_id', [session('city_id', \App\Contact::first()->id), null]);
        $q = $request->search;
        $products = $products->where('name', 'like', "%$q%")->paginate(12);
        $title = 'Поиск';
    	return view('search', compact('products', 'q', 'title'));
    }

     public function modal(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

         return [
            'product'  => view('partials.modal_content', compact('product'))->render(),
        ];
    }
}

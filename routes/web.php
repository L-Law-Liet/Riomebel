<?php

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/', 'ViewController@index')->name('welcome');
Route::get('/category/{c}/{s?}', 'ProductController@category')->name('category');
Route::get('ajax-filter/{p}/{c}/{s?}', 'AjaxController@index')->name('ajax-filter');
Route::get('/box', 'ViewController@box')->name('box');
Route::get('/favorite', 'ViewController@favorite')->name('favorite');
Route::get('/product/{id}', 'ProductController@product')->name('product');


Route::post('/sendemail', 'BidController@send')->name('sendemail');
Route::post('/change_city', 'CityController@changeCity')->name('changeCity');
Route::get('/search', 'ProductController@search')->name('search');
Route::post('/open_modal', 'ProductController@modal');

Route::group(['prefix' => 'wishlist'], function () {
    Route::post('add', 'WishlistController@add');
    Route::post('remove', 'WishlistController@remove');
    Route::post('destroy', 'WishlistController@destroy');
});

Route::group(['prefix' => 'cart'], function () {
    Route::post('add', 'CartController@add');
    Route::post('update', 'CartController@update');
    Route::post('remove', 'CartController@remove');
    Route::post('destroy', 'CartController@destroy');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::post('delivery', 'CheckoutController@delivery')->name('formDelivery');
    Route::post('pickup', 'CheckoutController@pickup')->name('formPickup');
});
Route::get('artisan-link', function (){
   Artisan::call('storage:link'); 
});
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::get('/check-payment', 'CheckoutController@checkPayment')->name('check-payment');
Route::get('/success/{paymentMethod}/{id}', 'CheckoutController@success')->name('success');
Route::get('/fail', 'CheckoutController@fail')->name('fail');

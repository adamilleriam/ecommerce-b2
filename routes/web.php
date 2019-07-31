<?php

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
// SSL Routes

Route::post('success', 'Front\CheckoutController@success');
Route::post('fail', 'Front\CheckoutController@fail');
Route::post('cancel', 'Front\CheckoutController@cancel');

Route::post('ipn', 'Front\CheckoutController@ipn');


Route::get('/','HomeController@index')->name('home');
Route::get('products/{id?}','Front\ProductController@index')->name('front.product.index');
Route::get('product/{id}','Front\ProductController@details')->name('product.details');
Route::get('cart','Front\ProductController@cart')->name('cart');
Route::get('payment/gateway/{orderId}','Front\CheckoutController@payment_gateway')->name('payment.gateway');
Route::get('payment/{customerId}/{orderId}','Front\CheckoutController@payment')->name('payment');
Route::get('checkout','Front\CheckoutController@index')->name('checkout');
Route::post('customer/store','Front\CustomerController@store')->name('customer.store');
Route::get('ajax/add-to-cart/{product_id}','Front\AjaxController@addToCart')->name('ajax.addToCart');



Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('category','CategoryController');
    Route::post('category/{id}/restore','CategoryController@restore')->name('category.restore');
    Route::delete('category/{id}/delete','CategoryController@delete')->name('category.delete');

    Route::resource('brand','BrandController');
    Route::post('brand/{id}/restore','BrandController@restore')->name('brand.restore');
    Route::delete('brand/{id}/delete','BrandController@delete')->name('brand.delete');

    Route::resource('product','ProductController');
    Route::post('product/{id}/restore','ProductController@restore')->name('product.restore');
    Route::delete('product/{id}/delete','ProductController@delete')->name('product.delete');
    Route::get('product/{image_id}/delete/image','ProductController@delete_image')->name('product.delete.image');

    Route::resource('user','UserController');
    Route::post('user/{id}/restore','UserController@restore')->name('user.restore');
    Route::delete('user/{id}/delete','UserController@delete')->name('user.delete');

});

Auth::routes();



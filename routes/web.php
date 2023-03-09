<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
//Home & login page
Route::get('/', 'jotno_shop\customerController@customer')->name('jotno.customer');
Route::get('/login', 'jotno_shop\customerController@login')->name('jotno.login');
Route::get('/cat_product/{category_id}', 'jotno_shop\customerController@cat_product')->name('jotno.cat_product');
Route::get('/product_details/{slug}', 'jotno_shop\customerController@productDtails')->name('jotno.product.details');
Route::post('/searchProduct', 'jotno_shop\customerController@searchProduct')->name('search.product');
Route::get('/getProduct', 'jotno_shop\customerController@getProduct')->name('get.product');

//Registration and email Verification
Route::get('/register/view', 'jotno_admin\registerController@view')->name('register.view');
Route::post('/register/store', 'jotno_admin\registerController@store')->name('register.store');
Route::get('/register/sent-email-verification-code','jotno_admin\registerController@sentemailverificationcode')->name('sent.email.verification.code');
Route::post('/register/verifyemailcodestore','jotno_admin\registerController@verifyemailcodestore')->name('verify.email.code.store');

// Add to Cart
Route::post('/addToCart/insert', 'jotno_shop\AddToCartController@insert')->name('insert.cart');
Route::get('/addToCart/view', 'jotno_shop\AddToCartController@view')->name('view.cart');
Route::post('/addToCart/update', 'jotno_shop\AddToCartController@update')->name('update.cart');
Route::get('/addToCart/delete/{rowId}', 'jotno_shop\AddToCartController@delete')->name('delete.cart');

// Check Out
Route::get('/checkout', 'jotno_shop\checkOutController@checkOut')->name('checkOut');
Route::post('/checkout/store', 'jotno_shop\checkOutController@store')->name('checkout.store');


Auth::routes();

Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/main', 'jotno_admin\adminController@main')->name('jotno.main');

    Route::prefix('Register')->group(function()
    {
        Route::get('customer_view', 'jotno_admin\registerController@customer_view')->name('Register.customer.view');
        Route::get('stuff_view', 'jotno_admin\registerController@stuff_view')->name('Register.stuff.view');
        Route::get('create', 'jotno_admin\registerController@create')->name('Register.create');
        Route::post('admin_store', 'jotno_admin\registerController@admin_store')->name('Register.admin.store');
        Route::get('edit/{id}', 'jotno_admin\registerController@edit')->name('Register.edit');
        Route::post('update/{id}', 'jotno_admin\registerController@update')->name('Register.update');
        Route::delete('delete/{id}', 'jotno_admin\registerController@delete')->name('Register.delete');
        Route::get('customer_details/{id}', 'jotno_admin\registerController@customer_details')->name('Register.details.customer');
        Route::get('stuff_details/{id}', 'jotno_admin\registerController@stuff_details')->name('Register.details.stuff');
    });

    Route::prefix('Category')->group(function()
    {
        Route::get('/view', 'jotno_admin\categoryController@view')->name('category.view');
        Route::get('/create', 'jotno_admin\categoryController@create')->name('category.create');
        Route::post('/store', 'jotno_admin\categoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'jotno_admin\categoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'jotno_admin\categoryController@update')->name('category.update');
        Route::delete('/delete/{id}', 'jotno_admin\categoryController@delete')->name('category.delete');
    });

    Route::prefix('Brand')->group(function()
    {
        Route::get('/view', 'jotno_admin\brandController@view')->name('brand.view');
        Route::get('/create', 'jotno_admin\brandController@create')->name('brand.create');
        Route::post('/store', 'jotno_admin\brandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'jotno_admin\brandController@edit')->name('brand.edit');
        Route::post('/update/{id}', 'jotno_admin\brandController@update')->name('brand.update');
        Route::delete('/delete/{id}', 'jotno_admin\brandController@delete')->name('brand.delete');
    });

    Route::prefix('Size')->group(function()
    {
        Route::get('/view', 'jotno_admin\sizeController@view')->name('size.view');
        Route::get('/create', 'jotno_admin\sizeController@create')->name('size.create');
        Route::post('/store', 'jotno_admin\sizeController@store')->name('size.store');
        Route::get('/edit/{id}', 'jotno_admin\sizeController@edit')->name('size.edit');
        Route::post('/update/{id}', 'jotno_admin\sizeController@update')->name('size.update');
        Route::delete('/delete/{id}', 'jotno_admin\sizeController@delete')->name('size.delete');
    });

    Route::prefix('Color')->group(function()
    {
        Route::get('/view', 'jotno_admin\colorController@view')->name('color.view');
        Route::get('/create', 'jotno_admin\colorController@create')->name('color.create');
        Route::post('/store', 'jotno_admin\colorController@store')->name('color.store');
        Route::get('/edit/{id}', 'jotno_admin\colorController@edit')->name('color.edit');
        Route::post('/update/{id}', 'jotno_admin\colorController@update')->name('color.update');
        Route::delete('/delete/{id}', 'jotno_admin\colorController@delete')->name('color.delete');
    });

    Route::prefix('Weight')->group(function()
    {
        Route::get('/view', 'jotno_admin\weightController@view')->name('weight.view');
        Route::get('/create', 'jotno_admin\weightController@create')->name('weight.create');
        Route::post('/store', 'jotno_admin\weightController@store')->name('weight.store');
        Route::get('/edit/{id}', 'jotno_admin\weightController@edit')->name('weight.edit');
        Route::post('/update/{id}', 'jotno_admin\weightController@update')->name('weight.update');
        Route::delete('/delete/{id}', 'jotno_admin\weightController@delete')->name('weight.delete');
    });

    Route::prefix('Product')->group(function()
    {
        Route::get('/view', 'jotno_admin\productController@view')->name('product.view');
        Route::get('/create', 'jotno_admin\productController@create')->name('product.create');
        Route::post('/store', 'jotno_admin\productController@store')->name('product.store');
        Route::get('/edit/{id}', 'jotno_admin\productController@edit')->name('product.edit');
        Route::post('/update/{id}', 'jotno_admin\productController@update')->name('product.update');
        Route::get('/related_img_edit/{id}', 'jotno_admin\productController@relatedimgedit')->name('product.related_img.edit');
        Route::post('/related_img_update/{id}', 'jotno_admin\productController@relatedimgupdate')->name('product.related_img.update');
        Route::delete('/delete/{id}', 'jotno_admin\productController@delete')->name('product.delete');
        Route::get('details/{id}', 'jotno_admin\productController@details')->name('product.details');
    });

    Route::prefix('Order')->group(function()
    {
        Route::get('/pending', 'jotno_admin\orderController@pending')->name('pending.order');
        Route::get('/approved', 'jotno_admin\orderController@approved')->name('approved.order');
        Route::get('/details/{id}', 'jotno_admin\orderController@details')->name('order.details');
        Route::post('/store', 'jotno_admin\orderController@store')->name('order.store');
        Route::get('/edit/{id}', 'jotno_admin\orderController@edit')->name('order.edit');
        Route::post('/update/{id}', 'jotno_admin\orderController@update')->name('order.update');
    });

    Route::prefix('MainCarousel')->group(function()
    {
        Route::get('/view', 'jotno_admin\mainCarouselController@view')->name('mainCarousel.view');
        Route::get('/create', 'jotno_admin\mainCarouselController@create')->name('mainCarousel.create');
        Route::post('/store', 'jotno_admin\mainCarouselController@store')->name('mainCarousel.store');
        Route::get('/edit/{id}', 'jotno_admin\mainCarouselController@edit')->name('mainCarousel.edit');
        Route::post('/update/{id}', 'jotno_admin\mainCarouselController@update')->name('mainCarousel.update');
        Route::delete('/delete/{id}', 'jotno_admin\mainCarouselController@delete')->name('mainCarousel.delete');
    });
});

Route::group(['middleware'=>['auth','customer']],function (){
    Route::get('/jotnoshop', 'jotno_shop\customerController@jotnoshop')->name('jotno.shop');
    Route::get('/jotnoshop/payment', 'jotno_shop\customerController@payment')->name('jotno.shop.payment');
    Route::post('/jotnoshop/payment/store', 'jotno_shop\customerController@store')->name('jotnoshop.payment.store');
    Route::get('/jotnoshop/orderList', 'jotno_shop\customerController@orderList')->name('jotnoshop.orderList');
    Route::get('/jotnoshop/orderDetails/{id}', 'jotno_shop\customerController@orderDetails')->name('jotnoshop.order.details');
});



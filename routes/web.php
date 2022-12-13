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

Route::get('/', 'jotno_shop\customerController@customer')->name('jotno.customer');
Route::get('/login', 'jotno_shop\customerController@login')->name('jotno.login');
Route::get('/register/view', 'jotno_admin\registerController@view')->name('register.view');
Route::post('/register/store', 'jotno_admin\registerController@store')->name('register.store');
Route::get('/register/sent-email-verification-code','jotno_admin\registerController@sentemailverificationcode')->name('sent.email.verification.code');
Route::post('/register/verifyemailcodestore','jotno_admin\registerController@verifyemailcodestore')->name('verify.email.code.store');

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
});

Route::group(['middleware'=>['auth','customer']],function (){
    Route::get('/jotnoshop', 'jotno_shop\customerController@jotnoshop')->name('jotno.shop');
});



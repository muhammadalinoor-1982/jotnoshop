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
/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/main', 'jotno_admin\adminController@main')->name('jotno.main');
});

Route::group(['middleware'=>['auth','customer']],function (){
    Route::get('/jotnoshop', 'jotno_shop\customerController@jotnoshop')->name('jotno.shop');
});

Route::prefix('Register')->group(function()
{
    Route::get('customer_view', 'jotno_admin\registerController@customer_view')->name('Register.customer.view');
    Route::get('stuff_view', 'jotno_admin\registerController@stuff_view')->name('Register.stuff.view');
    Route::get('create', 'jotno_admin\registerController@create')->name('register.create');
    Route::get('edit/{id}', 'techreme\registerController@edit')->name('Register.edit');
    Route::post('update/{id}', 'techreme\registerController@update')->name('Register.update');
    Route::delete('delete/{id}', 'techreme\registerController@delete')->name('Register.delete');
    Route::get('details_client/{id}', 'techreme\registerController@details_client')->name('Register.details.client');
    Route::get('details_stuff/{id}', 'techreme\registerController@details_stuff')->name('Register.details.stuff');
});

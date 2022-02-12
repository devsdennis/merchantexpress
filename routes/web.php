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

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home','HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->middleware(['web', 'guest']);
Route::post('logout', 'Auth\LoginController@logout')->middleware(['web'])->name('logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->middleware(['web', 'guest'])->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->middleware(['web','guest'])->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->middleware(['web','guest']);
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->middleware(['web','guest'])->name('password.reset');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/register',function(){
        return view('auth.register');
})->name('register');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);;

//Route to handle news
Route::resource('news','NewsController')->middleware('adminroutes');;

//Route for user read news
Route::get('readnews','NewsController@readnews')->middleware('auth');;

//Search mpesa registrations codes
Route::get('/cashbook/mpesacodes','CashBookController@mpesacodes');

//Route to handle the post of mpesacodes
Route::post('/cashbook/postmpesacodes','CashBookController@postmpesacodes');

//Users controller
Route::resource('users','UserController')->middleware('adminroutes');;

//function to activate users
Route::get('users/activate/{id}','UserController@activate')->middleware('adminroutes');;

//Route to get inactive users
Route::get('inactive','UserController@inactive')->middleware('adminroutes');;

 

//Route to handle medic data
Route::resource('merchants','MerchantController')->middleware('adminroutes');;

//Route to handle the treat ment
Route::resource('order','OrderController')->middleware('adminroutes');;

//Medic treatment home
Route::get('merchanthome','MerchantOrderController@home');

//Handle the delivery  of orders
Route::get('merchantorder/{id}','MerchantOrderController@order');

//Get a medic finance
Route::get('merchantfinance','MerchantFinanceControllerr@home');
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ve/access/token', 'MpesaController@generateAccessToken');
Route::post('ve/stk/call', 'MpesaController@Stkcallback');
Route::post('ve/stk/push', 'MpesaController@customerMpesaSTKPush');
Route::post('ve/validation', 'MpesaController@mpesaValidation');
Route::post('ve/confirmation', 'MpesaController@mpesaConfirmation');
Route::get('ve/register', 'MpesaController@mpesaRegisterUrls');
Route::post('ve/b2c','MpesaController@mpesab2c');
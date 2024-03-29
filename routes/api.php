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

Route::group(['middleware'=>'cors','as' => 'api.'],function (){
    Route::post('/access_token','Api\AuthController@accessToken')->name('access_token');
    Route::post('/refresh_token','Api\AuthController@refreshToken')->name('refresh_token');

    Route::group(['middleware'=> 'auth:api'],function (){
        Route::post('/logout','Api\AuthController@logout')->name('logout');
        Route::resource('/banks','Api\BanksController',['only' => ['index']]);
        Route::resource('/bank_accounts','Api\BankAccountsController',['except' => ['create','edit']]);
        Route::get('/user', function (Request $request){
//        $user = Auth::guard('api')->user();
            $user = $request->user('api');
            return $user;
        })->middleware('auth:api')->name('user');
    });
});
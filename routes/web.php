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
use \Illuminate\Support\Facades\Gate;

Route::get('/user',function (){
    \Illuminate\Support\Facades\Auth::loginUsingId(1);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
    return redirect()->route('admin.home');
});

Route::get('/app', function () {
    return view('layouts.spa');
});

Route::group([
    'prefix' => 'admin/',
    'as' => 'admin.'
], function (){

    Auth::routes();

    Route::group(['middleware' => 'can:access-admin'], function (){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('banks','Admin\BanksController',['except'=>'show']);
    });
});
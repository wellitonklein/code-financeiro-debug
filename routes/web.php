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

Route::get('/', function () {
//    \Illuminate\Support\Facades\Auth::loginUsingId(2);
    if (Gate::allows('access-admin')){
        return "Usuário com permissão de admin";
    }else{
        return "Usuário sem permissão de admin";
    }
//    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/error', function(){
    return view("auth/error");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rules', 'RuleController@index');
Route::get('/rule', 'RuleController@add')->name('rule');
Route::post('/RemoveId', 'WorkerController@remove');

Route::post('/RemoveRule', 'RuleController@remove');
Route::post('/changeRule', 'RuleController@change');
Route::post('/add_rule', 'RuleController@addrule')->name('add_rule');


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

//Route::get('/phones/{title}','PhonesController@phonesShow');

//Route::get('/{resource}/{topic}', 'ItemsController@display');

Route::get('/', function () {
    return view('welcome');
});

Route::get('rfid-med-todolist', function () {
    return view('rfid-med-todolist');
});

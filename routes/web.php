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
    return view('index');
});

Route::post('/whoami', 'WhatsMyNameController@index');

Route::get('/askme', function() { return view('whoami'); });



Route::get('/login', function() { return view('login'); });

Route::post('/dologin', 'LoginController@index');

Route::get('/logout', 'LoginController@logout');


Route::get('/loginvalidate', function() { return view('login3'); });

Route::post('/dologin3', 'LoginController3@index');


Route::get('/customer', function() { return view('customer'); });

Route::post('/addcustomer', 'CustomerController@index');



// Route to add order
Route::get('/neworder', function() { return view('order'); });

Route::post('/addorder', 'OrderController@index');



Route::resource('/usersrest', 'UsersRestController');

Route::resource('/rest', 'RestClientController');


Route::get('/loggingservice','TestLoggingController@index');








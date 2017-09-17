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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/completed','crudController@completed');

Route::get('/ticket/{ticket}', 'crudController@view');
Route::get('/addticket', 'crudController@add');
Route::post('/addticket', 'crudController@create');
Route::post('/add/comment', 'crudController@comment');
Route::PATCH('/update/{ticket}','crudController@update');


Route::get('/delete/{pid}', [
	'uses' => 'crudController@destroy',
	'as' => 'delete',
	'middleware' => 'auth'
	]);

Route::get('/close/{ticket}','crudController@close');
Route::get('/open/{ticket}','crudController@open');


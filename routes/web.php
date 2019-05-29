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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//admin
Route::group(['middleware' => ['auth']],function(){
		
});

//login form for admin...
Route::match(['get','post'],'/admin','AdminController@login');

//if login success for admin...
Route::get('admin/dashboard', 'AdminController@dashboard');

//form to add users...
Route::match(['get','post'],'/admin/add_user','AdminController@register_users');

Route::get('/logout', 'AdminController@logout');



//for items create
Route::get('/item/create','ItemController@create');
// item store
Route::post('/item/store',[
        'uses'=>'ItemController@store',
        'as'=>'item.store'
    ]);
//view the list of submenus...
Route::get('/item/view','ItemController@index');
//to edit item...
Route::get('/item/{id}/edit','ItemController@edit');
//update items
Route::patch('/item/update/{id}',[
    'uses' => 'ItemController@update',
    'as'  => 'item.update'
]);
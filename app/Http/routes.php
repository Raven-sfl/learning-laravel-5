<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('map', function () {
    return view('map');
});

Route::get('/adminko', function () {
    return view('adminko.app');
});
Route::resource('adminko/articles', 'adminko\AdminArticlesController');
Route::resource('adminko/pages', 'adminko\AdminPagesController');
Route::post('del_image', 'adminko\AdminArticlesController@del_image');
Route::post('del_object_image', 'adminko\AdminObjectsController@del_object_image');

Route::get('adminko/objects/', 'adminko\AdminObjectsController@index');
Route::get('adminko/objects/{type}', 'adminko\AdminObjectsController@index_type');
Route::get('adminko/objects/{type}/create', 'adminko\AdminObjectsController@create');
Route::get('adminko/objects/{type}/{objects}/edit', 'adminko\AdminObjectsController@edit');
Route::get('adminko/objects/{type}/{objects}', 'adminko\AdminObjectsController@show');
Route::post('adminko/objects/{type}/create', 'adminko\AdminObjectsController@store');
Route::patch('adminko/objects/{type}/{objects}', 'adminko\AdminObjectsController@update');
Route::delete('adminko/objects/{type}/{objects}', 'adminko\AdminObjectsController@destroy');

//Route::resource('adminko/objects', 'adminko\AdminObjectsController');

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::post('currency/set', 'Currency@setCurrency');
//Route::get('currency/get/{id}','Currency@getCurrency');
Route::get('cookie/set', 'temp@setCookie');


Route::get('/rates', 'frontend\PagesController@rate');

//Route::get('objects/flats/rooms/{rooms}', 'frontend\ObjectsController@index_type');

Route::get('objects/{type}/{param_1?}/{param_2?}/', function ($type, $param_1 = null, $param_2 = null) {
    if (isset($param_1) and isset($param_2)) {
        $rooms = $param_1;
        $id = $param_2;
    } elseif (isset($param_1) and in_array($param_1, ['rooms1', 'rooms2', 'rooms3', 'rooms4', 'rooms5'])) {
        $rooms = $param_1;
        $id = null;
    } else {
        $rooms = null;
        $id = $param_1;
    }
    if (!isset($id)) {
        $parameters = [$type, $rooms];
        $controller = \App()->make('App\Http\Controllers\frontend\ObjectsController');
        return $controller->callAction('index_type', $parameters);
    } else {
        $parameters = [$type, $rooms, $id];
        $controller = \App()->make('App\Http\Controllers\frontend\ObjectsController');
        return $controller->callAction('show', $parameters);
    }
});

Route::resource('articles', 'frontend\ArticlesController');
Route::get('/filter', 'frontend\ObjectsController@filter');
Route::post('/search', 'frontend\ObjectsController@searchId');
Route::get('/cookie/get', 'temp@getCookie');
Route::get('/', 'frontend\PagesController@index');
Route::get('{slug}', 'frontend\PagesController@show');
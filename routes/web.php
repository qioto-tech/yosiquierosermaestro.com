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

Route::resource('/teacher','TeacherController');
Route::resource('/order','OrderController');
Route::resource('/resultado','ResultController');


Route::get('/', function () {
    return view('welcome');
});
	
	Route::get('/index.html', function () {
		return view('welcome');
	});
	
	Route::get('/tips', function () {
		return view('welcomePruebas');
	});
	
	Route::get('/ayuda', function () {
			return view('helpme');
		});
	Route::post('/teacher-search-suitable/search', 'TeacherController@searchTeacher_suitable');
	Route::post('/teacher-search-elegible/search', 'TeacherController@searchTeacher_elegible');
	Route::get('/idoneo', 'TeacherController@suitable');
	Route::get('/elegible', 'TeacherController@elegible');
	Route::get('/aprobado/{order}', 'OrderController@approved');
	Route::get('/reprobado/{order}', 'OrderController@disapproved');
//	Route::get('/pendientes', 'OrderController@pending');
	Route::get('/deposito/{order}', 'OrderController@deposit');
	Route::get('/autorizar/{order}', 'OrderController@authorize_payment');
	Route::post('/search/search', 'TeacherController@search');
	Route::post('/search-result/result', 'ResultController@validate_result');
	Route::get('/parameters/result/{param}/{note}', 'ResultController@parameters_result');
    Route::get('/render/{id_partial}', ['as' => 'render', 'uses' => 'OrderController@RenderPartial']);
    Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registro', 'HomeController@registro')->name('registro');
Route::post('/save', 'HomeController@save')->name('save');
Route::post('/update_order', 'HomeController@update_manual')->name('update_order');
Route::get('/contactar', 'HomeController@clients')->name('contactar');
Route::get('/client/{teacher}', 'HomeController@showTeacher');
Route::post('/update_client', 'HomeController@update_teacher')->name('update_client');
Route::get('/mailsend/{teacher}', 'HomeController@mailTeacher');
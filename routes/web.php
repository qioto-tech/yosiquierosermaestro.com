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
Route::resource('/payment','PaymentController');


Route::get('/', function () {
    return view('welcome');
});
	
	Route::get('/index.html', function () {
		return view('welcome');
	});
		
	Route::post('/teacher-search-suitable/search', 'TeacherController@searchTeacher_suitable');
	Route::post('/teacher-search-elegible/search', 'TeacherController@searchTeacher_elegible');
	Route::get('/idoneo', 'TeacherController@suitable');
	Route::get('/elegible', 'TeacherController@elegible');
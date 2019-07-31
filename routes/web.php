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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('blank');})->name('dashboard');
Route::get('media', function () {return view('file-manager');})->name('media');

Auth::routes();
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::get('/user-json-list', 'UserController@user_json_list')->name('user.json.list');
/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/
Route::resource('/student', 'StudentController');
Route::get('/student-lower/create', 'StudentController@create_lower')->name('student.create.lower');
Route::post('/student-higher/view', 'StudentController@show_higher_students')->name('show.higher.student');
/*Province*/
Route::get('province','ProvinceController@provinces')->name('province.json');

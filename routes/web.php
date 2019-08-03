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
Route::post('/student-higher/view/{id}', 'StudentController@show_higher_students')->name('show.higher.student');
/*Student import*/
Route::get('/student-import', 'StudentController@excel_import_index')->name('student.higher.index');
Route::post('/student-import-store', 'StudentController@excel_import')->name('student.higher.store');
Route::get('/student-higher-upgrade/{id}', 'StudentController@student_higher_upgrade_show')->name('student.higher.upgrade.show');
Route::put('/student-higher-upgrade/{id}', 'StudentController@student_higher_upgrade_store')->name('student.higher.upgrade');
/*Province*/
Route::get('province','ProvinceController@provinces')->name('province.json');

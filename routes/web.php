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

// Route::get('/', function () {
//     return view('welcome');
// });

// -------------Teacher Details Controller Routes ------------------------// 
Route::get('/', 'TeacherDetailsController@index')->name('home');
Route::post('teacher/create', 'TeacherDetailsController@create')->name('teacherCreate');
Route::post('get/faculty/module', 'TeacherDetailsController@facultyModule')->name('loadFacultyModules');
Route::get('teacher/export', 'TeacherDetailsController@export')->name('export');

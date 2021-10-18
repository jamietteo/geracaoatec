<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['register' => false]);

//Login
Route::get('/', 'HomeController@index')->name('/');

//other routes
<<<<<<< HEAD
Route::view('/homePage', 'homePage');
Route::resource('dashboard', 'HomeController')->middleware('auth');
=======
Route::resource('dashboard', 'HomeController');
>>>>>>> 25745de24884144a858db78374d058285bd16512
Route::resource('groups', 'GroupController')->middleware('auth');
Route::resource('institutions', 'InstitutionController')->middleware('auth');
Route::resource('roles', 'RoleController')->middleware('auth');
Route::resource('sessions', 'SessionController')->middleware('auth');
Route::resource('students', 'StudentController')->middleware('auth');
Route::resource('tests', 'TestController')->middleware('auth');
Route::resource('users', 'UserController');
Route::resource('userForms', 'UserFormController')->middleware('auth');











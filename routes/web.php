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


Route::get('/dashboard', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');


Route::get('tests/insert/{id}', 'TestController@insert');
Route::resource('groups', 'GroupController');
Route::resource('institutions', 'InstitutionController');
Route::resource('roles', 'RoleController');
Route::resource('sessions', 'SessionController');
Route::resource('students', 'StudentController');
Route::resource('tests', 'TestController');
Route::resource('users', 'UserController');
Route::resource('userForms', 'UserFormController');









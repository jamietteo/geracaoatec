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
Route::view('/home', 'homePage')->middleware('auth');
Route::resource('dashboard', 'HomeController')->middleware('auth');

Route::prefix('users')->group(function(){
    Route::get('', 'UserController@index')->middleware('auth');
    Route::get('create', 'UserController@create')->middleware('gestor');
    Route::post('', 'UserController@store')->middleware('gestor');
    Route::get('{user}', 'UserController@show')->middleware('auth');
    Route::get('{user}/edit', 'UserController@edit')->middleware('gestor');
    Route::put('{user}', 'UserController@update')->middleware('gestor');
    Route::delete('{user}', 'UserController@destroy')->middleware('gestor');
});

Route::prefix('groups')->group(function(){
    Route::get('', 'GroupController@index')->middleware('auth');
    Route::get('/create', 'GroupController@create')->middleware('auth');
    Route::post('', 'GroupController@store')->middleware('auth');
    Route::get('{group}', 'GroupController@show')->middleware('auth');
    Route::get('{group}/edit', 'GroupController@edit')->middleware('auth');
    Route::put('{group}', 'GroupController@update')->middleware('auth');
    Route::delete('{group}', 'GroupController@destroy')->middleware('gestor');
});

Route::prefix('roles')->group(function(){
    Route::get('', 'RoleController@index')->middleware('gestor');
    Route::get('/create', 'RoleController@create')->middleware('gestor');
    Route::post('', 'RoleController@store')->middleware('gestor');
    Route::get('{role}', 'RoleController@show')->middleware('gestor');
    Route::get('{role}/edit', 'RoleController@edit')->middleware('gestor');
    Route::put('{role}', 'RoleController@update')->middleware('gestor');
    Route::delete('{role}', 'RoleController@destroy')->middleware('gestor');
});

Route::prefix('sessions')->group(function(){
    Route::get('', 'SessionController@index')->middleware('gestortecnica');
    Route::get('/create', 'SessionController@create')->middleware('gestortecnica');
    Route::post('', 'SessionController@store')->middleware('gestortecnica');
    Route::get('{session}', 'SessionController@show')->middleware('gestortecnica');
    Route::get('{session}/edit', 'SessionController@edit')->middleware('gestortecnica');
    Route::put('{session}', 'SessionController@update')->middleware('gestortecnica');
    Route::delete('{session}', 'SessionController@destroy')->middleware('gestortecnica');
});

Route::prefix('students')->group(function(){
    Route::get('', 'StudentController@index')->middleware('auth');
    Route::get('/create', 'StudentController@create')->middleware('auth');
    Route::post('', 'StudentController@store')->middleware('auth');
    Route::get('{student}', 'StudentController@show')->middleware('auth');
    Route::get('{student}/edit', 'StudentController@edit')->middleware('auth');
    Route::put('{student}', 'StudentController@update')->middleware('auth');
    Route::delete('{student}', 'StudentController@destroy')->middleware('auth');
});

Route::prefix('tests')->group(function(){
    Route::get('', 'TestController@index')->middleware('auth');
    Route::get('/create', 'TestController@create')->middleware('auth');
    Route::post('', 'TestController@store')->middleware('auth');
    Route::get('{test}', 'TestController@show')->middleware('auth');
    Route::get('{test}/edit', 'TestController@edit')->middleware('auth');
    Route::put('{test}', 'TestController@update')->middleware('auth');
    Route::delete('{test}', 'TestController@destroy')->middleware('auth');
});

Route::prefix('userForms')->group(function(){
    Route::get('', 'UserFormController@index')->middleware('auth');
    Route::get('/create/{id?}', 'UserFormController@create')->name('userForm.create')->middleware('gestortecnica');
    Route::get('/create', 'UserFormController@create')->middleware('gestortecnica');
    Route::post('', 'UserFormController@store')->middleware('gestortecnica');
    Route::get('{userForm}', 'UserFormController@show')->middleware('gestortecnica');
    Route::get('{userForm}/edit', 'UserFormController@edit')->middleware('gestortecnica');
    Route::put('{userForm}', 'UserFormController@update')->middleware('gestortecnica');
    Route::delete('{userForm}', 'UserFormController@destroy')->middleware('gestortecnica');
});









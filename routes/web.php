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

//other routes
Route::view('/', 'homePage')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::prefix('users')->group(function(){
        Route::get('', 'UserController@index')->middleware('auth');
        Route::get('create', 'UserController@create')->middleware('gestor');
        Route::post('', 'UserController@store')->middleware('gestor');
        Route::get('{user}', 'UserController@show')->middleware('WithoutGuest');
        Route::get('{user}/edit', 'UserController@edit')->middleware('gestor');
        Route::put('{user}', 'UserController@update')->middleware('gestor');
        Route::delete('{user}', 'UserController@destroy')->middleware('gestor');
    });
});

Route::middleware('auth')->group(function(){
    Route::prefix('groups')->group(function(){
        Route::get('', 'GroupController@index')->middleware('auth');
        Route::get('/create', 'GroupController@create')->middleware('gestor');
        Route::post('', 'GroupController@store')->middleware('WithoutGuest');
        Route::get('{group}', 'GroupController@show')->middleware('WithoutGuest');
        Route::get('{group}/edit', 'GroupController@edit')->middleware('WithoutGuest');
        Route::put('{group}', 'GroupController@update')->middleware('WithoutGuest');
        Route::delete('{group}', 'GroupController@destroy')->middleware('gestor');
    });
});
Route::middleware('auth')->group(function(){
    Route::prefix('roles')->group(function () {
        Route::get('', 'RoleController@index')->middleware('gestor');
        Route::get('/create', 'RoleController@create')->middleware('gestor');
        Route::post('', 'RoleController@store')->middleware('gestor');
        Route::get('{role}', 'RoleController@show')->middleware('gestor');
        Route::get('{role}/edit', 'RoleController@edit')->middleware('gestor');
        Route::put('{role}', 'RoleController@update')->middleware('gestor');
        Route::delete('{role}', 'RoleController@destroy')->middleware('gestor');
    });
});
Route::middleware('auth')->group(function(){
    Route::prefix('sessions')->group(function(){
        Route::get('', 'SessionController@index')->middleware('gestortecnica');
        Route::get('/create/{id?}', 'SessionController@create')->name('session.create')->middleware('gestortecnica');
        Route::get('/create', 'SessionController@create')->middleware('gestortecnica');
        Route::post('', 'SessionController@store')->middleware('gestortecnica');
        Route::get('{session}', 'SessionController@show')->middleware('gestortecnica');
        Route::get('{session}/edit', 'SessionController@edit')->middleware('gestortecnica');
        Route::put('{session}', 'SessionController@update')->middleware('gestortecnica');
        Route::delete('{session}', 'SessionController@destroy')->middleware('gestortecnica');
    });
});

Route::middleware('auth')->group(function(){
    Route::prefix('students')->group(function(){
    Route::get('', 'StudentController@index')->middleware('auth');
    Route::get('/create', 'StudentController@create')->middleware('WithoutGuest');
    Route::post('', 'StudentController@store')->middleware('WithoutGuest');
    Route::get('{student}', 'StudentController@show')->middleware('WithoutGuest');
    Route::get('{student}/edit', 'StudentController@edit')->middleware('WithoutGuest');
    Route::put('{student}', 'StudentController@update')->middleware('WithoutGuest');
    Route::delete('{student}', 'StudentController@destroy')->middleware('WithoutGuest');
    });
});

Route::middleware('auth')->group(function(){
    Route::prefix('tests')->group(function(){
        Route::get('', 'TestController@index')->middleware('WithoutGuest');
        Route::get('/create/{id?}', 'TestController@create')->name('test.create')->middleware('WithoutGuest');
        Route::get('/create', 'TestController@create')->middleware('WithoutGuest');
        Route::post('', 'TestController@store')->middleware('WithoutGuest');
        Route::get('{test}', 'TestController@show')->middleware('WithoutGuest');
        Route::get('{test}/edit', 'TestController@edit')->middleware('WithoutGuest');
        Route::put('{test}', 'TestController@update')->middleware('WithoutGuest');
        Route::delete('{test}', 'TestController@destroy')->middleware('WithoutGuest');
    });
});

Route::middleware('auth')->group(function(){
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
});

Route::middleware('auth')->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('', 'DashboardController@index')->middleware('auth');
    });
});

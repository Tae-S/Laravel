<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

//Route::get('/fourofour','App\Http\Controllers\EmployeesController@error');
//Route::get('/employees/fourofour', 'App\Http\Controllers\EmployeesContoller@error');
//Route::get('/employees', 'App\Http\Controllers\EmployeesController@error');

//Route::resource('/employees', 'App\Http\Controllers\EmployeesController');
Route::resource('/companies','App\Http\Controllers\CompaniesController');

Route::resource('/employees','App\Http\Controllers\EmployeesController');

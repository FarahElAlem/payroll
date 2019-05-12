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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('operations', 'OperationsController');
Route::resource('employees', 'EmployeesController');
Route::resource('componenttypes', 'ComponentTypesController');
Route::resource('components', 'ComponentsController');
Route::resource('payrolls', 'PayrollsController');
Route::resource('payrollcomponents', 'PayrollComponentsController');
Route::get('demo-generate-pdf','PayrollComponentsController@demoGeneratePDF');

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

use App\Http\Controllers\PlanningController;
use Illuminate\Support\Facades\Route;

Route::resource('planning', PlanningController::class);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PlanningController@index')->name('planning');

Route::get('/show/{plan}', 'PlanningController@show')->name('show');

Route::get('/create/{type}', 'PlanningController@create')->name('create');
Route::post('/', 'PlanningController@store')->name('store');


Route::get('/', 'PlanningController@index')->name('planning');
Route::post('/plan/delete/{id}', ['as' => 'delete_plan' , 'uses' => 'PlanningController@delete_task']);

Route::get('/task/delete/{plan_id}/{task_id}', 'PlanningController@delete_task')->name('delete_task');

Route::get('/edit/{plan}', 'PlanningController@edit')->name('edit');

Route::post('update/{id}', 'PlanningController@update')->name('update');

Route::get('/delete/{id}', 'PlanningController@delete')->name('delete');


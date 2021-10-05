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

Route::get('/', 'LoginController@index');
Route::post('/verifylogin', 'LoginController@authenticate')->name('verifylogin');

Route::get('/show/{plan}', 'PlanningController@show')->name('show');

Route::get('/create/{type}', 'PlanningController@create')->name('create');
Route::post('/store', 'PlanningController@store')->name('store');

Route::get('/index', 'PlanningController@index')->name('planning');
Route::post('/plan/delete/{id}', ['as' => 'delete_plan' , 'uses' => 'PlanningController@delete_task']);

Route::get('/task/delete/{plan_id}/{task_id}', 'PlanningController@delete_task')->name('delete_task');
Route::get('/task/update_done/{plan_id}/{task_id}', 'PlanningController@task_done')->name('task_done');

Route::get('/edit/{plan}', 'PlanningController@edit')->name('edit');

Route::post('update/{id}', 'PlanningController@update')->name('update');

Route::get('/delete/{id}', 'PlanningController@delete')->name('delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

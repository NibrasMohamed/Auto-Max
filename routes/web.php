<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsWorker;

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
    return view('welcome');
});
Route::get('/home', 'PagesController@index')->name('home');
Route::get('/aboutus', 'PagesController@about');
Route::get('/workerreg', 'PagesController@w_reg');
Route::get('/create', 'PagesController@create')->middleware('auth');

Route::get('/worker', 'DashboardController@worker_home')->name('worker.home')->middleware('is_worker');
Auth::routes();

// Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/register_form', 'DashboardController@register')->name('register1');
// Route::get('/customer_table',[ 'DashboardController@customer', 'as'=>'users.index']);
Route::post('/workers/register', 'Auth\RegisterController@storeWorker');
Route::post('/workers/update', 'Auth\RegisterController@updateWorker');
Route::get('customer_table', ['uses'=>'DashboardController@customer', 'as'=>'users.index']); //customer table
Route::get('worker_table', ['uses'=>'DashboardController@worker', 'as'=>'worker.index']);
Route::get('/View/{id}', 'UserController@show')->name('view');
Route::get('/Delete/{id}', 'UserController@destroy')->name('Delete');


Route::get('/projects_table', 'ProjectController@projects')->name('projects.index');
Route::get('/projects', 'PagesController@projects');
Route::get('/on_going', 'PagesController@on_going');

Route::get('/admin/appointment/index', 'ProjectController@adminAppointments');
Route::post('/admin/appointment/approve', 'ProjectController@adminApproveAppointments');

Route::get('/appointment/index', 'ProjectController@index');
Route::get('/appointment/create', 'ProjectController@create')->middleware('is_worker');
Route::post('/appointment/store', 'ProjectController@store');
Route::get('/appointment/edit/{id}', 'ProjectController@edit');
Route::get('/appointment/image/{id}', 'ProjectController@getImage');
Route::post('/appointment/update', 'ProjectController@update');
Route::post('/appointment/delete', 'ProjectController@destroy');
Route::post('/appointment/update-stats', 'ProjectController@updateStatus');

Route::get('/appointment/details/get/{project_id}', 'ProjectController@getAppointmentDetails');
Route::get('/appointment/details/create', 'ProjectController@createAppointmentDetails');
Route::post('/appointment/details/store', 'ProjectController@storeAppointmentDetails');
Route::get('/appointment/details/get-image/{id}', 'ProjectController@getImageByFileMaster');


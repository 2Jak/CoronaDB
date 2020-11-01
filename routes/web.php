<?php
use App\Http\Controllers\ConfirmedCasesController;
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

Route::get('/', 'PagesController@confirmedCasesAdminPanel')->middleware('auth');
Route::get('/confirmed_cases/admin', 'PagesController@confirmedCasesAdminPanel')->middleware('auth');

Route::resource('confirmed_cases', 'ConfirmedCasesController')->only(['index']);
Route::get('confirmed_cases/{filter}', 'ConfirmedCasesController@indexWithFilter');
Route::get('confirmed_cases/{orderBy}', 'ConfirmedCasesController@orderedIndex');
Route::resource('hospitals', 'HospitalsController')->only(['index']);
Route::get('hospitals/{orderBy}', 'HospitalsController@orderedIndex');
Route::resource('cities', 'CitiesController')->only(['index', 'show']);
Route::resource('medical_workers', 'MedicalWorkersController')->only(['index']);
Route::resource('confirmed_cases', 'ConfirmedCasesController')->except(['index'])->middleware('auth');
Route::resource('hospitals', 'HospitalsController')->except(['index'])->middleware('auth');
Route::resource('cities', 'CitiesController')->except(['index', 'show'])->middleware('auth');
Route::resource('medical_workers', 'MedicalWorkersController')->except(['index'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

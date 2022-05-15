<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/', '/home');

/*Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');*/

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/



Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/* contacts us */
Route::get('/contactus','\App\Http\Controllers\ContactController@index');
Route::post('/contactus','\App\Http\Controllers\ContactController@store')->name('contactus.store');
/* weblog */
Route::get('/weblog','\App\Http\Controllers\WeblogController@index')->name('weblog.index');
Route::get('/weblog/{id}/{weblogSlug}','\App\Http\Controllers\WeblogController@detailWeblog')->name('weblog.detailWeblog');
Route::post('/weblog','\App\Http\Controllers\WeblogController@send')->name('weblog.send');
Route::get('/weblog/delete/{id}','\App\Http\Controllers\WeblogController@delete');
/* suggestion */
Route::get('/suggestion','\App\Http\Controllers\SuggestionController@index');









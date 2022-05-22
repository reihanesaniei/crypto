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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/



Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/* contacts us */
Route::get('/contactus',[App\Http\Controllers\ContactController::class,'index']);
Route::post('/contactus',[App\Http\Controllers\ContactController::class,'store'])->name('contactus.store');
/* suggestion */
Route::get('/suggestion',[App\Http\Controllers\SuggestionController::class,'index']);
/* weblog */
Route::get('/weblog',[App\Http\Controllers\WeblogController::class,'index'])->name('weblog.index');
Route::get('/weblog/{id}/{weblogSlug}',[App\Http\Controllers\WeblogController::class,'detailWeblog'])->name('weblog.detailWeblog');
Route::post('/weblog',[App\Http\Controllers\WeblogController::class,'send'])->name('weblog.send');
Route::get('/weblog/delete/{id}',[App\Http\Controllers\WeblogController::class,'delete']);
Route::post('/weblog/{id}/{weblogSlug}',[App\Http\Controllers\CommentController::class,'index'])->name('detailWeblog.comment');










<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ContactController::class,'input'])->name('input');
Route::post('check/',[ContactController::class,'post'])->name('check.post');
Route::post('check/thanks',[ContactController::class,'store'])->name('check.store');


Route::get('/search/index', [SearchController::class,'index'])->name('search.index');
Route::get('/search', [SearchController::class,'search'])->name('search');
Route::post('/search', [SearchController::class,'delete'])->name('search.delete');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;
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

Route::get('/', [AlbumsController::class,'index']);
Route::get('/albums', [AlbumsController::class,'index']);
Route::get('/albums/create', [AlbumsController::class,'create']);
Route::get('/albums/{id}', [AlbumsController::class,'show']);
Route::post('/albums/store', [AlbumsController::class,'store']);

Route::get('/photos/create/{id}', [PhotosController::class,'create']);
Route::post('/photos/store', [PhotosController::class,'store']);
Route::get('/photos/{id}', [PhotosController::class,'show']);
Route::delete('/photos/{id}', [PhotosController::class,'destroy']);

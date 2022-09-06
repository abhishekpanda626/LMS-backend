<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('/register/user',[UserController::class,'register']);
Route::post('/login/user',[UserController::class,'userlogin']);
Route::post('/register/admin',[AdminController::class,'adminreg']);
Route::post('/login/admin',[AdminController::class,'adminlogin']);
Route::get('/users',[UserController::class,'showusers']);
Route::get('/books/display',[BookController::class,'display']);
Route::post('/books/add',[BookController::class,'addBook']);
Route::delete('/books/delete/{id}',[BookController::class,'delete']);
Route::delete('users/delete/{id}',[UserController::class,'delete']);

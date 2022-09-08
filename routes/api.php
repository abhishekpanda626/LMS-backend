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
//  Route::group(['middleware'=>'auth:api'],function () {
    
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/books/display',[BookController::class,'display']);
});
Route::post('/register/user',[UserController::class,'register']);
Route::post('/login/user',[UserController::class,'userlogin']);
Route::post('/register/admin',[AdminController::class,'adminreg']);
Route::post('/login/admin',[AdminController::class,'adminlogin']);
Route::get('/users',[UserController::class,'showusers']);

Route::post('/books/add',[BookController::class,'addBook']);
Route::delete('/books/delete/{id}',[BookController::class,'delete']);
Route::delete('users/delete/{id}',[UserController::class,'delete']);
Route::get('/books/{id}',[BookController::class,'getBook']);
Route::put('/books/update/{id}',[BookController::class,'update']);
Route::put('/users/update/{id}',[UserController::class,'update']);
Route::get('/users/get/{id}',[UserController::class,'getUser']);
Route::get('users/search/',[UserController::class,'searchUser']);

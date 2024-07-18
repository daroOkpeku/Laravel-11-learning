<?php

use App\Http\Controllers\GetController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(PostController::class)->group(function(){
Route::post('/createuser', 'createUser');
Route::post('/login', 'login');
Route::post('/ordercreate', 'orderCreate');
Route::get('/singleuser', 'singleUser');
Route::get('/ordersingle', 'orderSingle');
});


Route::middleware('auth:sanctum')->group(function(){

Route::controller(GetController::class)->group(function(){
Route::get('usersview', 'usersView');
});



});



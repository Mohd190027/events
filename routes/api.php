<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function(){
Route::middleware('checkRole')->group(function(){
Route::post('events',[EventController::class,'store']);
Route::get('events',[EventController::class,'index']);
Route::put('events/{id}',[EventController::class,'update']);
Route::get('events/{id}',[EventController::class,'show']);
Route::delete('events/{id}',[EventController::class,'delete']);


Route::post('tickets',[TicketController::class,'store']);
Route::get('tickets',[TicketController::class,'index']);
Route::put('tickets/{id}',[TicketController::class,'update']);
Route::get('tickets/{id}',[TicketController::class,'show']);
Route::delete('tickets/{id}',[TicketController::class,'delete']);
Route::get('tickets/{id}/user',[TicketController::class,'getTicketUser']);
});
});


Route::get('users/{id}/tickets',[UserController::class,'getusertickets']);

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');







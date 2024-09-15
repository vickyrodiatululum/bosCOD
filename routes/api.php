<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransferController;

Route::group([ 'middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('update-token', [AuthController::class,'updateToken']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('/transfer', [TransferController::class, 'createTransfer']);
});

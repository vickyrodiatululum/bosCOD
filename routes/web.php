<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransferController;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/transfer', [TransferController::class, 'showTransferForm'])->middleware('auth:web')->name('transfer.show');
Route::post('/transfer', [TransferController::class, 'createTransfer'])->middleware('auth:web')->name('transfer.create');


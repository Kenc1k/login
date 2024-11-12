<?php

use App\Http\Controllers\CheckCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Psy\VersionUpdater\Checker;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/message' , [TestController::class , 'create'])->name('send.message');
Route::get('/check_code' , [CheckCodeController::class , 'index'])->name('check.code');
require __DIR__.'/auth.php';
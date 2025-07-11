<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscribeHandler']);
    Route::post('/blogs/{blog:slug}/comment',[BlogController::class,'storeComment']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin routes

    Route::get("/admin/dashboard",[AdminController::class,'dashboard'])->middleware('admin');
    Route::get("/admin/blog/create",[AdminController::class,'create'])->middleware('admin');

});

require __DIR__.'/auth.php';

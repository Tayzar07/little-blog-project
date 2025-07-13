<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
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
    Route::get('/user/profile', [RegisteredUserController::class, 'userProfile']);
    Route::post('/user/profile/update', [RegisteredUserController::class, 'updateProfile']);



    // admin routes

    Route::get("/admin/dashboard",[AdminController::class,'dashboard'])->middleware('admin');
    Route::get("/admin/blog/create",[AdminController::class,'create'])->middleware('admin');
    Route::post("/admin/blog/create",[AdminController::class,'store'])->middleware('admin');
    Route::delete("/admin/blogs/{blog:slug}/delete",[AdminController::class,'destroy'])->middleware('admin')->name('blog.destroy');
    Route::get("/admin/blogs/{blog:slug}/edit",[AdminController::class,'edit'])->middleware('admin');
    Route::post("/admin/blogs/{blog:slug}/update",[AdminController::class,'update'])->middleware('admin');
    Route::get("/admin/profile/edit",[AdminController::class,'editProfile'])->middleware('admin');
    Route::post("/admin/profile/update",[AdminController::class,'updateProfile'])->middleware('admin');
    Route::get("/admin/adminlist",[AdminController::class,'showadmins'])->middleware('admin');
    Route::get("/admin/userlist",[AdminController::class,'showusers'])->middleware('admin');
    Route::get("/admin/adminlist/{user:username}/changeToUser",[AdminController::class,'changeToUser'])->middleware('admin');
    Route::get("/admin/adminlist/{user:username}/changeToAdmin",[AdminController::class,'changeToAdmin'])->middleware('admin');
    Route::delete("/admin/userlist/{user:username}/delete",[AdminController::class,'destoryUser'])->middleware('admin')->name('user.destory');
    Route::delete("/admin/comments/{comment}/delete",[AdminController::class,'destoryComment'])->middleware('admin')->name('comment.destory');





});

require __DIR__.'/auth.php';

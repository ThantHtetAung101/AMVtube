<?php

use App\Http\Controllers\AmvController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;

Route::get('amvtube/', [AmvController::class, 'home']);
Route::get('amvtube/watch/{id}', [AmvController::class, 'watch']);
Route::get('amvtube/upload', [AmvController::class, 'upload']);
Route::post('amvtube/postamv', [AmvController::class, 'post']);
Route::get('amvtube/edit/{id}', [AmvController::class, 'edit'])->name("edit");
Route::post('amvtube/modify/{id}', [AmvController::class, 'modify']);
Route::post('amvtube/comment', [CommentController::class, 'comment']);
Route::post('amvtube/like/{id}/{value}/{userid}', [AmvController::class, 'like'])->name("amvtube.like");
Route::post('amvtube/dislike/{id}/{value}/{userid}', [AmvController::class, 'dislike'])->name("amvtube.dislike");
Route::post('amvtube/sub/{id}/{value}/{user_id}', [AmvController::class, 'sub'])->name("amvtube.sub");
Route::get('amvtube/account/{id}', [AmvController::class, 'acc'])->name("account");
Route::post('amvtube/newview/{id}', [AmvController::class, 'view']);
Route::get('amvtube/ban', [AmvController::class, 'ban']);
Route::get('amvtube/liked', [AmvController::class, 'likedvideo']);
Route::get('/', [AmvController::class, 'home']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

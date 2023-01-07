<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::get('/posts',[PostsController::class,'index']);
Route::post('/posts',[PostsController::class,'store']);
Route::get('/posts/{post}',[PostsController::class,'show']);
Route::patch('/posts/{post}',[PostsController::class,'update']);
Route::delete('/posts/{post}',[PostsController::class,'destroy']);
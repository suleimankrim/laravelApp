<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/comments',[CommentController::class,'index']);
Route::post('/comments',[CommentController::class,'store']);
Route::get('/comments/{comment}',[CommentController::class,'show']);
Route::patch('/comments/{comment}',[CommentController::class,'update']);
Route::delete('/comments/{comment}',[CommentController::class,'destroy']);
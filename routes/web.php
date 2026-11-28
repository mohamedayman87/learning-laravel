<?php

use App\Http\Controllers\IdeaController;
use App\Models\Idea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/Ideas', [IdeaController::class, 'index']);
Route::get('/Ideas/create', [IdeaController::class, 'create']);
Route::get('/Ideas/clear', [IdeaController::class, 'clear']);
Route::get('/Ideas/{idea}', [IdeaController::class, 'show']);
Route::get('/Ideas/{idea}/edit', [IdeaController::class, 'edit']);
Route::patch('/Ideas/{idea}', [IdeaController::class, 'update']);
Route::delete('/Ideas/{idea}', [IdeaController::class, 'destroy']);
Route::post('/Ideas', [IdeaController::class, 'store']);



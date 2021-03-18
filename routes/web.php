<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;

// Short circuit to questions controller
Route::get('/', [QuestionsController::class, "index"]);
/*
|--------------------------------------------------------------------------
| Questions Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/questions', [QuestionsController::class, "index"]);
Route::get("/questions/create", [QuestionsController::class, "create"]);
Route::post("/questions", [QuestionsController::class, "store"]);
Route::get('/questions/{question}', [QuestionsController::class, "show"]);


/*
|--------------------------------------------------------------------------
| Answer Routes
|--------------------------------------------------------------------------
|
*/
Route::post("/questions/{question}/answers", [AnswersController::class, "store"]);

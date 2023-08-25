<?php

use App\Http\Controllers\Question\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/admin-panel', function () {
    return view('app');
});
Route::get('/questions', [QuestionController::class, "getAllQuestions"])->name("question.getAllQuestions");
Route::post('/question', [QuestionController::class, "create"])->name("question.create");
Route::patch('/question/{question}', [QuestionController::class, "update"])->name("question.update");
Route::delete('/question/{question}', [QuestionController::class, "destroy"])->name("api.question.destroy");

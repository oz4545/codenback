<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

//Rutas usuarios

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Rutas Formularios

Route::get('quiz/{formId}/question/{questionId}', [QuizController::class, 'showQuestion'])
    ->name('quiz.show')
    ->defaults('questionId', 1);

Route::post('quiz/{formId}/question/{questionId}/validate', [QuizController::class, 'validateAnswer'])
    ->name('quiz.validate');

Route::get('quiz/{formId}/completed', [QuizController::class, 'completed'])
    ->name('quiz.completed');

//Rutas Home

Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

//Rutas autentificacion

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Rutas middleware

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', function () {
        return view('home.inicio');
    })->name('inicio');
});








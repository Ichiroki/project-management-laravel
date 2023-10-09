<?php

use App\Http\Controllers\{UserController, ProjectController};
use App\Http\Controllers\Authentication\{LoginController, RegisterController};
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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::prefix('/')->group(function() {
    Route::prefix('project')->group(function() {
        Route::get('/', [ProjectController::class, 'index'])->name('project');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/create', [ProjectController::class, 'store'])->name('project.add');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');

        Route::get('/{slug}', [ProjectController::class, 'show'])->name('project.detail');
    });

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user');

        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/create', [UserController::class, 'store'])->name('user.add');

        Route::get('/edit/{id}/{name?}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/edit/{id}/{name?}', [UserController::class, 'update'])->name('user.update');

        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        Route::get('/{id}/{name?}', [UserController::class, 'show'])->name('user.detail');
    });

    return view('welcome');
});

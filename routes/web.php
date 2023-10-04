<?php

use App\Http\Controllers\ProjectController;
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

Route::get('/', [ProjectController::class, 'index']);

Route::prefix('project')->group(function() {
    Route::post('/add', [ProjectController::class, 'store'])->name('project.add');

    Route::get('/detail', [ProjectController::class, 'show'])->name('project.detail');
});

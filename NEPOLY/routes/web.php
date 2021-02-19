<?php

use App\Models\HistoryText;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryTextController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homeController::class,'index'])->name('index');

Route::get('addHistory', [HistoryTextController::class, 'index'])->name('add');

Route::get('/dashboard', [ProfileController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

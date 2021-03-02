<?php

use App\Http\Controllers\authorController;
use App\Http\Controllers\HistoryParController;
use App\Models\HistoryText;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryTextController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\searchController;
use App\Models\HistoryPar;

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

// ГЛАВНАЯ
Route::get('/', [homeController::class,'index'])->name('index');
// ДОБАВИТЬ РАБОТУ
Route::get('addHistory', [HistoryTextController::class, 'index'])->middleware(['auth'])->name('add');
// СМОТРЕТЬ ВСЕ РАБОТЫ
Route::get('showWorks', [HistoryParController::class, 'index'])->name('show');
// СМОТРЕТЬ ВСЕХ ПОЛЬЗОВАТЕЛЕЙ
Route::get('allAuthors', [authorController::class, 'index'])->name('author');
// ПОИСК РАБОТ
Route::get('search', [searchController::class, 'index'])->name('search');



// ДОБАВЛЕНИЕ РАБОТЫ
Route::post('addwork',[HistoryTextController::class, 'store'])->middleware(['auth'])->name('addwork');
// ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ
Route::get('/dashboard', [ProfileController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

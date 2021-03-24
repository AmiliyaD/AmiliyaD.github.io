<?php

use App\Http\Controllers\authorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryParController;
use App\Models\HistoryText;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryTextController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\searchController;
use App\Models\HistoryPar;
use Illuminate\Routing\RouteRegistrar;

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
// СМОТРЕТЬ ГЛАВУ РАБОТЫ
Route::get('showWorkPar/{par_id}', [HistoryParController::class, 'create'])->name("showWorkPar");
// СМОТРЕТЬ ВСЕХ ПОЛЬЗОВАТЕЛЕЙ
Route::get('allAuthors', [authorController::class, 'index'])->name('author');
// ПОИСК РАБОТ
Route::get('search', [searchController::class, 'index'])->name('search');


// ОТКРЫТЬ ФОРМУ ДЛЯ ДОБАВЛЕНИЯ НОВОЙ ГЛАВЫ
Route::get('addPar/{id}', [HistoryTextController::class, 'show'])->middleware(['auth'])->name('addPar');
//форма для новой главы
Route::get('addParT/{id}', [HistoryParController::class, 'show'])->middleware(['auth'])->name('addParT');
// ДОБАВИТЬ НОВУЮ ГЛАВУ
Route::post('addParText', [HistoryTextController::class, 'edit'])->middleware(['auth'])->name('addParText');
//ОБНОВИТЬ РАБОТУ
Route::post('update', [HistoryParController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('showWork/{id}', [HistoryTextController::class, 'showWork'])->name('showWork');

//ДОБАВИТЬ ГЛАВУ ВСЮ
Route::get('editPar/{ed_id}',[HistoryTextController::class, 'openPar'] )->middleware(['auth'])->name('editPar');
Route::post('updatePar', [HistoryTextController::class, 'update'])->name("updatePar");
// УДАЛИТЬ РАБОТУ
Route::post('deletePar', [HistoryParController::class, 'destroy'])->middleware(['auth'])->name("delete");
Route::post('deleteOnePar',[HistoryTextController::class, 'destroy'])->middleware(['auth'])->name('destroyOnePar');

// РАБОТА ЗАВЕРЕШЕНА
Route::post('workFinished', [HistoryParController::class, 'finishWork'])->middleware(['auth'])->name('finish');
// ДОБАВЛЕНИЕ РАБОТЫ
Route::post('addwork',[HistoryTextController::class, 'store'])->middleware(['auth'])->name('addwork');



// ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ
Route::get('/dashboard', [ProfileController::class,'index'])->middleware(['auth'])->name('dashboard');

// ДОБАВИТЬ КОММЕНТАРИЙ
Route::post('addComment',[CommentController::class, 'store'] )->middleware(['auth'])->name('addComment');

Route::post('addCommentPar', [CommentController::class, 'storePar'])->middleware('auth')->name('addCommentPar');


Route::get('searchFunc', [searchController::class, 'searchFunc'])->name('searchFunc');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\MypageFormController;
use App\Http\Controllers\Discard\DiscardController;
use App\Http\Controllers\Discard\DiscardObjController;


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

require __DIR__.'/auth.php';

Route::get('/user/index', [PostController::class, 'index'])->name('user.index');

// Route::resource('/user/{id}/mypage', MypageFormController::class);
Route::prefix('mypage') //頭にmypageをつける
    ->name('mypage.')
    ->controller(MypageFormController::class)
    ->group(function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('discard_list')
    ->name('discard_list.')
    ->controller(DiscardController::class)
    ->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}/show', 'show')->name('show');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
        Route::get('/discard', 'discard')->name('discard');
});

Route::prefix('discard')
    ->name('discard.')
    ->controller(DiscardObjController::class)
    ->group(function(){
        Route::get('/{listname}/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/{id}/update', 'update')->name('update');
        Route::post('/{id}/destroy', 'destroy')->name('destroy');
        Route::post('/discard', 'discard')->name('discard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [TopController::class, 'top'])->name('top');
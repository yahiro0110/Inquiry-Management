<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

// トップページ
Route::get('/', function () {
    return view('top');
})->name('contact.top');

// お問い合わせ入力画面
Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/create', [ContactController::class, 'post'])->name('contact.post');
Route::get('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/confirm', [ContactController::class, 'store'])->name('contact.store');
Route::get('/back', [ContactController::class, 'back'])->name('contact.back');

// お問い合わせ一覧画面
Route::get('/index', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/index/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

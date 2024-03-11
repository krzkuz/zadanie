<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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

//articles
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::delete('/article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');

//authors
Route::get('/all-authors', [UserController::class, 'allAuthors'])->name('authors');
Route::get('/author/create', [UserController::class, 'create'])->name('author.create');
Route::get('/author/{id}', [UserController::class, 'show'])->name('author');
Route::get('/author/edit/{id}', [UserController::class, 'edit'])->name('author.edit');
Route::put('/author/update/{id}', [UserController::class, 'update'])->name('author.update');
Route::post('/author/store', [UserController::class, 'store'])->name('author.store');
Route::delete('/author/delete/{id}', [UserController::class, 'delete'])->name('author.delete');

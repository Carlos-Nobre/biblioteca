<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;

#Rotas de Cadastro

Route::get('user/register' , [UserController::class, 'register']) -> name('user.register');
Route::post('user',[UserController::class, 'store'])->name('user.store');

#Rotas de Login

Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth'])->name('user.auth')->middleware('guest');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

#Rota de home
Route::get('home', function(){ return view('biblioteca');})->name('home')->middleware('auth');

#Rotas Dos Livros

Route::get('/books', [BookController::class,'index'])->name('books.index') ->middleware('auth');
Route::get('/books/create', [BookController::class,'create'])->name('books.create') ->middleware('auth');
Route::post('/books', [BookController::class,'store'])->name('books.store') ->middleware('auth');
Route::get('/books/{book}', [BookController::class,'show'])->name('books.show') ->middleware('auth');
Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('books.edit') ->middleware('auth');
Route::put('/books/{book}', [BookController::class,'update'])->name('books.update') ->middleware('auth');
Route::delete('/books/{book}', [BookController::class,'destroy'])->name('books.destroy') ->middleware('auth');
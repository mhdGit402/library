<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GetBookController;
use App\Http\Controllers\SavedBookController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [UserController::class, 'registerIndex']);
Route::post('/register', [UserController::class, 'addUser']);

Route::get('/login', [UserController::class, 'loginIndex']);
Route::post('/login', [UserController::class, 'loginUser']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/dashboard/book/create', [LibraryController::class, 'createIndex']);
Route::post('/dashboard/book/create', [LibraryController::class, 'addBook']);
Route::get('/book/my', [GetBookController::class, 'showBooks']);
Route::get('/book/saved', [SavedBookController::class, 'index']);
Route::get('/book/{id}', [LibraryController::class, 'index']);

Route::delete('/saved/{id}/delete', [SavedBookController::class, 'delete']);
Route::post('/save/{id}', [LibraryController::class, 'saveBook']);

Route::get('get/{id}', [GetBookController::class, 'index']);
Route::post('/get/{id}', [GetBookController::class, 'getBook']);

Route::get('/category', [CategoryController::class, 'show']);
Route::get('/dashboard/category/create', [CategoryController::class, 'createIndex']);
Route::post('/dashboard/category/create', [CategoryController::class, 'addCategory']);
Route::get('/category/{id}', [CategoryController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/users/list', [DashboardController::class, 'userList']);
Route::get('/dashboard/books/list', [DashboardController::class, 'bookList']);

Route::delete('user/{id}/delete', [DashboardController::class, 'userDelete']);
Route::get('/dashboard/user/{id}/update', [DashboardController::class, 'userUpdateIndex']);
Route::patch('/dashboard/user/{id}/update', [DashboardController::class, 'userUpdate']);
Route::get('/dashboard/user/{id}', [UserController::class, 'showUser']);

Route::get('/s/{search}', [HomeController::class, 'search']);
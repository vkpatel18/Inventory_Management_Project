<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/login_form', [LoginController::class, 'login_form'])->name('login_form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register_form', [RegisterController::class, 'register_form'])->name('register_form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [ProductController::class, 'dashboard'])->name('home');

Route::get('/profile.edit', [ProductController::class, 'profile.edit'])->name('profile.edit');
Route::get('/profile.update', [ProductController::class, 'profile.update'])->name('profile.update');
Route::get('/profile.password', [ProductController::class, 'profile.password'])->name('profile.password');
Route::get('/user.index', [ProductController::class, 'user.index'])->name('user.index');
Route::get('/icons', [ProductController::class, 'icons'])->name('icons');
Route::get('/map', [ProductController::class, 'map'])->name('map');
Route::get('/upgrade', [ProductController::class, 'upgrade'])->name('upgrade');


Route::resource('/products', ProductController::class);
Route::resource('/taxes', TaxController::class);
Route::resource('/units', UnitController::class);
Route::resource('/stocks', StockController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/purchases', PurchaseController::class);
Route::resource('/categories', CategoryController::class);


<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

//Content routing
Route::get('/', [ListingController::class, 'showAll'])->name('home');

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('create-listing');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth')->name('store-listing');

Route::get('/listings/{listing}/edit/{slug}', [ListingController::class, 'edit'])->middleware('auth')->name('edit-listing');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth')->name('update-listing');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth')->name('delete-listing');

Route::get('/listings/{listing}/{slug}', [ListingController::class, 'showOne'])->name('listing');

//Auth routing
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('create-user');
Route::post('/users', [UserController::class, 'store'])->name('store-user');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate-user');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout-user');
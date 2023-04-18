<?php

use App\Http\Controllers\ListingController;
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

Route::get('/', [ListingController::class, 'showAll'])->name('home');

Route::get('/listings/create', [ListingController::class, 'create'])->name('create-listing');
Route::post('/listings', [ListingController::class, 'store'])->name('store-listing');

Route::get('/listings/{listing}/edit/{slug}', [ListingController::class, 'edit'])->name('edit-listing');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('update-listing');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('delete-listing');

Route::get('/listings/{listing}/{slug}', [ListingController::class, 'showOne'])->name('listing');

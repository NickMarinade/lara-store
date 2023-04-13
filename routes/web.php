<?php

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

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
})->name('home');

Route::get('listings/{id}/{slug}', function ($id) {
    $listing = Listing::find($id);
    $slug = Str::slug($listing->title);

    return view('listing', ['listing' => $listing, 'slug' => $slug]);
})->name('listing');

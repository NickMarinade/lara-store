<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function showAll() {
        
        return view('listings', [
            'heading' => 'Latest Listings',
            'listings' => Listing::all()
        ]);
    }

    public function showOne(Listing $listing) {
        
        $slug = Str::slug($listing->title);
        
        return view('listing', ['listing' => $listing, 'slug' => $slug]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function showAll() {
        
        return view('listings.showAll', [
    
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    public function showOne(Listing $listing) {
        
        $slug = Str::slug($listing->title);
        
        return view('listings.showOne', ['listing' => $listing, 'slug' => $slug]);

    }
}

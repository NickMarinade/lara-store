<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function showAll() {
        
        return view('listings.showAll', [
    
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    public function showOne(Listing $listing) {
        
        $slug = Str::slug($listing->title);
        
        return view('listings.showOne', ['listing' => $listing, 'slug' => $slug]);

    }

    public function create() {
        
        return view('listings.create');

    }

    public function store(Request $request) {

        $formFields = $request->validate([
            'title' => ['required', Rule::unique('listings', 'title')],
            'tags' => 'required',
            'trailer' => ['required', 'url'],
            'website' => ['required', 'url'],
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Content added!');

    }

    public function edit(Listing $listing) {

        $slug = Str::slug($listing->title);
        return view('listings.edit', ['listing' => $listing, 'slug' => $slug]);
    }

    public function update(Request $request, Listing $listing) {

        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'trailer' => ['required', 'url'],
            'website' => ['required', 'url'],
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Content updated!');

    }

    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Content deleted!');
    }
}
 
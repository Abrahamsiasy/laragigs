<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index(){
        return view('listings.index', [
            // 'listings' => Listing::latest()->get()
            'listings' => Listing::latest()->filter(request(['tag']))->paginate(6)
        ]);
    }


    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create() {
        return view('listings.create');
    }
    //store a listing
    public function store(Request $request){
        // dd($request->all());
        $formField = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'desc' => 'required'
        ]);
        Listing::create($formField);
        return redirect('/')->with('message', 'Listing created successfully');
    }
}

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
        //dd($request->file('logo'));
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

        //save the log fromthe filed to logs folder in the publick directory
        if($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }
        //dd($formField);
        Listing::create($formField);
        return redirect('/')->with('message', 'Listing created successfully');
    }
}

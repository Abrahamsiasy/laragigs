<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index(){
        //dd(auth()->user());
        if(!auth()->user()->hasRole('admin')) {
            return view('listings.index', [
                // 'listings' => Listing::latest()->get()
                'listings' => Listing::latest()->filter(request(['tag']))->paginate(6)
            ]);

        } else abort(503);
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
        return redirect('/home')->with('message', 'Listing created successfully');
    }
    public function edit(Listing $listing) {
        //dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update a listing
    public function update(Request $request, Listing $listing){
        //dd($request->all());
        //dd($request->file('logo'));
        $formField = $request->validate([
            'title' => 'required',
            'company' => 'required',
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
        //dd($listing);
        //dd($formField);
        $listing->update($formField);
        return back()->with('message', 'Listing Updated successfully');
    }

    //Delete destroy
    public function delete(Listing $listing){
        //dd($listing);
        $listing->delete();
        return redirect('/home')->with('message', 'Listing Deleted successfully');

    }
}

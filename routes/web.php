<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//All Listings
Route::get('/',   [ListingController::class, 'index']);

//get a signel listing

Route::get('listing/{listing}', [ListingController::class, 'show'] );


Route::get('/hello', function () {
    return response('hello world');
});

Route::get('/post/{id}', function ($id) {
    dd($id);
    return response('post' . $id);
});

Route::get('/search', function (Request $request) {
    dd($request->name . ' ' . $request->city);
    return response();
});

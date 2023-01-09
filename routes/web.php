<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home',   [ListingController::class, 'index'])->name('list.home');



    //get create form
    Route::get('/listing/create',   [ListingController::class, 'create'])->name('list.create');
    //store listing data
    Route::post('/listing',   [ListingController::class, 'store'])->name('list.store');


    //get a signel listing
    Route::get('listing/{listing}', [ListingController::class, 'show'] )->name('list.show');


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


});

require __DIR__.'/auth.php';

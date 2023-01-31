<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
});

// todo CREATE a ROUTE for the chirpController with classes
Route::resource('chirps', ChirpController::class)

    // todo CREATE two ROUTES for
        // * index: display our form and a listing of chirps.
        // * store: saving new chirps
        ->only(['index', 'store'])

    // todo CREATE two ROUTES for Middleware
        // * auth: middleware ensure that only logged-in user can access the route.
        // * verified: middleware will be used if you decide to enable email verfication.
        ->middleware(['auth', 'verified']);

    require __DIR__.'/auth.php';
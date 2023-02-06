<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

/* ------------------------- LARAVEL DEFAULT PACKAGE ------------------------ */

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/* -------------------------------------------------------------------------- */


/* ---------------------------- TESTING ROUTES ! ---------------------------- */

// * PAGE TWO TEST !
Route::get('/page_two', function () {
    return Inertia::render('Page_two');
})->name('page_two');

// * RETURN JSON FILE
Route::get('json', function () {
    return ["name" => "Abranka"];
});

// * LARACAST EXAMPLE PAGE

Route::get('myblog', function () {
    return Inertia::render('MyBlog');
})->name('myblog');
/* -------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage'); // * ->name('') = we can call it on blade file

Route::get('/eshop', function () {
    return view('pages/eshop');
})->name('eshop');

Route::get('/explore', function () {
    return view('pages/explore');
})->name('explore');

Route::get('/news', function () {
    return view('pages/news');
})->name('news');

Route::get('/forums', function () {
    return view('pages/forums');
})->name('forums');

Route::get('/about', function () {
    return view('pages/about');
})->name('about');
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  ARTICLES                                  */
/* -------------------------------------------------------------------------- */

// * ARTICLES ROUTE

Route::get('articles', function(){
    return "ARTICLES";
});

/* -------------------------------------------------------------------------- */
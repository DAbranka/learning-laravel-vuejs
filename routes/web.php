<?php

use App\Http\Controllers\ProfileController;
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

require __DIR__ . '/auth.php';

/* -------------------------------------------------------------------------- */
/*                                    POSTS                                   */
/* -------------------------------------------------------------------------- */

// * POSTS
Route::get('posts', function () {
    return view("Pages/Posts");
})->name('posts');

// * POST
Route::get('post', function () {

    /* -------------------------------- POST VARIABLES ------------------------------- */

    // todo GET content FROM posts/my-first-post & put it in variable

    // * __DIR__ = The Directory gives the PATH to the CONTENT.
    $post = file_get_contents(__DIR__ . '/../resources/views/Pages/posts/my-first-post.html');

    /* ------------------------------- POST RETURN ------------------------------ */
    return view('Pages/post', [
        'post' => $post // * VARIABLE POST! >> post.blade
    ]);
});

/* -------------------------------------------------------------------------- */
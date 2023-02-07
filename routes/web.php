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

//! ------------------------------- ROUTE POSTS ------------------------------ */
Route::get('posts', function () {
    return view("Pages/Posts");
})->name('posts');

//! ------------------------------- ROUTE POST ------------------------------- */

// * WILDCARD = {something} | here is {post}
// * $slug = A slug is part of (if not all of) the path in a url

Route::get('posts/{post}', function ($slug) {

    // ! CLEANER CODE

    // todo Find a post by it's slug and pass it to a view called "post"
    
    // todo FIND a post by it's slug
    $post = Post::find($slug);

    // todo PASS to view called "post"
    return view('post', [
        'post' => $post
    ]);

    // ! OLD CODE

    //! -------------------------------- POST VARIABLES ------------------------------- */

    // todo GET content FROM posts/my-first-post & put it in variable
    // * __DIR__ = The Directory gives the PATH to the CONTENT.
    
    // $post = file_get_contents(__DIR__ . '/../resources/views/Pages/posts/my-first-post.html');
    
    // todo REPLACE posts/my-first-post -> posts/{$slug}
    
    // $path = __DIR__ . "/../resources/views/Pages/posts/{$slug}.html";
    
    // ! CONDITION

    // ddd($path);

    // todo IF PATH DON'T EXIST!
        // todo SHOW ERROR MESSAGE
    // if(! file_exists($path)){

        // * dd = die and dump!
        // dd('file does not exist');
        // * Dump, Die, Debug!
        // ddd('files does not exist');
        // * 404 | Not Found
        // abort(404);
        // * REDIRECT TO HOMEPAGE
        // return redirect('posts');

    // }
    
    // todo $post = Get content from $path
    // $post = file_get_contents($path);


    //! ------------------------------- POST RETURN ------------------------------ */
    // return view('Pages/post', [

        // 'post' => $post // * 'post' = content from '$path'! >> post.blade

    // ]);

    // todo RETURN $slug = the part of url
    // return $slug;
})

// todo ADD CONSTRAINS

//  * where = on which page or part we want constrains
//  * [A-z]+ = look for anything from A to z | '+' = find one or more of an upper or lower case letter
// ->where('post', '[A-z_\-]+')

// * Alternative: whereAlpha = upper or lower case (ctrl+click on it to see other 'where')
// ->whereAlpha('post')
;

/* -------------------------------------------------------------------------- */
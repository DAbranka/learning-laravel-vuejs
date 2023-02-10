<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

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
    // return view("Pages/Posts");

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );

    $files = File::files(resource_path('views/Pages/posts/'));

    // $documents[];

    foreach ($files as $file) {
        $documents = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $documents->title,
            $documents->excerpt,
            $documents->date,
            $documents->body,
        );
    }

    ddd($posts[0]->title);

    // ddd($document);
    // $posts = Post::all();

    // * dump, die, debug $posts 
    // ddd($posts);
    // ddd($posts[0]->getFileName());
    // ddd($posts[0]->getContents());

    // return view("Pages/Posts", [
    //     'posts' => $posts
    // ]);
    // return Post::find('my-first-post'); // * We can return any post anywhere
})->name('posts');

//! ------------------------------- ROUTE POST ------------------------------- */

// * WILDCARD = {something} | here is {post}
// * $slug = A slug is part of (if not all of) the path in a url

Route::get('posts/{post}', function ($id) {

    // ! CLEANER CODE

    // todo Find a post by it's slug and pass it to a view called "post"

    // todo FIND a post by it's slug
    // $post = Post::find($slug); // * Post = Class Model

    // todo CREATE model class Post
    // todo PASS to view called "post" to Class Post
    return view('Pages/post', [
        'post' => Post::find($id)
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
    ->where('post', '[A-z_\-]+')

    // * Alternative: whereAlpha = upper or lower case (ctrl+click on it to see other 'where')
    // ->whereAlpha('post')
;

/* -------------------------------------------------------------------------- */
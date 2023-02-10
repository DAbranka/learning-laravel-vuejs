<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public function __construct($title, $excerpt, $date, $body){
        
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    //* ------------------------------ FUNCTION ALL ------------------------------ */
    public static function all($columns = ['*'])
    {
        $files = File::files(resource_path('views/Pages/posts'));

        // * Use of array_map to get every posts content in the debug!
        return array_map(function($file){
            return $file->getContents();
        },$files);
    }

    //* ------------------------------ FUNCTION FIND ----------------------------- */
    public static function find($slug){
        if (!file_exists($path = resource_path("views/Pages/posts/{$slug}.html"))){
            // return abort(404);
            
            // * Same as 404
            throw new ModelNotFoundException;
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
}
/* -------------------------------------------------------------------------- */
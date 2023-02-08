<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public static function all()
    {
        return File::files(resource_path("posts/"));
    }

    public static function find($slug){
        if (!file_exists($path = resource_path("views/Pages/posts/{$slug}.html"))){
            // return abort(404);
            
            // * Same as 404
            throw new ModelNotFoundException;
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function find($slug){

        if (!file_exists($path = resource_path("views/pages/posts/{$slug}.blade.php"))){
            // return redirect('/posts');
            return abort(404);
        }
        
        return cache()->remember("posts.{$slug}",1200, fn() => file_get_contents($path));
    }

}

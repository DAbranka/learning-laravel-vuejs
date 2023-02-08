<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Message extends Model
{
    use HasFactory;

    public static function find(){

        if(!file_get_contents($post = resource_path("/views/pages/example.blade.php"))){
            throw new ModelNotFoundException;
        };

    }
}

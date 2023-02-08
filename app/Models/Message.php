<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public static function find(){

        $post = resource_path("/views/pages/example.blade.php");

        return;

    }
}

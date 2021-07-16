<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post{
    public static function all()
    {
            $files = File::files(resource_path("posts/"));
            return array_map(fn($file) => $file-> getContents(), $files );
    }
    public static function  find($slug){

    if (! file_exists($path = resource_path("posts/{$slug}.html") )) {
//         // dd('file does not exist');
//         // abort(404);
        // return redirect('/');
        throw new ModelNotFoundException();
    }
// //    $post =  Cache() ->remember("post.{$slug}" ,10, function() use($path)
  return Cache() ->remember("post.{$slug}" ,10, fn() => file_get_contents($path));
//     // {
//         // var_dump('file_get_content($path)');
//         // return file_get_contents($path);
//     // });

    // return  view('post'  , [ 'post' =>$post]);
    }
}

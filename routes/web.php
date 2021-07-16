<?php

use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Scalar\MagicConst\Dir;

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
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {

    if (! file_exists($path =  __DIR__ ."/../resources/posts/{$slug}.html")) {
        // dd('file does not exist');
        // abort(404);
        return redirect('/');
    }
//    $post =  Cache() ->remember("post.{$slug}" ,10, function() use($path)
   $post =  Cache() ->remember("post.{$slug}" ,10, fn() => file_get_contents($path));
    // {
        // var_dump('file_get_content($path)');
        // return file_get_contents($path);
    // });

    return  view('post'  , [ 'post' =>$post]);
}) -> where('post' ,'[A-z_/-]+');

<?php

use App\Models\Post;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Scalar\MagicConst\Dir;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPSTORM_META\map;

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
    return view('posts', [
    'posts'=> Post::all()
 ]);
 });

Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
}) -> where('post', '[A-z_/-]+');

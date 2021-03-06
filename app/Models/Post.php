<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\This;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{

        public $post;
        public $excerpt;
        public $date;
        public $body;
        public $slug;
        public function __construct( $title, $excerpt , $date, $body, $slug)
        {
         $this -> title = $title;
         $this -> excerpt = $excerpt;
         $this -> date = $date;
         $this -> body = $body;
         $this -> slug = $slug;
        }


    public static function all()
    {
       return collect($files  = File::files(resource_path("posts")))
        ->map(fn($file)=> YamlFrontMatter::parseFile($file))
        -> map(fn($document)=> new Post(
                $document-> title,
                $document-> excerpt,
                $document-> date,
                $document-> body(),
                $document-> slug
            ));
    }
    public static function  find($slug){
        return static::all()->firstWhere('slug', $slug);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {

        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("post.{$slug}", 10, fn () => file_get_contents($path));

        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }

    public static function all()
    {
        // $files = File::files(resource_path("posts/"));

        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);

        $files = File::files(resource_path("posts/"));
        $posts = collect($files)
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(function ($documents){
                return new Post(
                    $documents->title,
                    $documents->excerpt,
                    $documents->date,
                    $documents->body(),
                    $documents->slug,
                );
            })
            ->sortByDesc('date');
        
        return $posts;
    }
}

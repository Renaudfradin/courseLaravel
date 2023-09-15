<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // >paginate(10)
    public function index(){
        return view('posts',[
            'posts' => $this->getPosts()->get(),
            'categories' => Categorie::all()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            'post' => $post
        ]);
    }

    public function getPosts(){
        return Post::latest()->filter(request(['search']));
    }
}

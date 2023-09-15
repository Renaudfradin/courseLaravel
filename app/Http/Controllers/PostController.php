<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

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

    public function getPostToCategorie(Categorie $categorie){
        return view('posts',[
            'posts' => $categorie->posts,
            'categories' => Categorie::all()
        ]);
    }

    public function getPostToAuthor(User $user){
        return view('posts',[
            'posts' => $user->posts,
            'categories' => Categorie::all()
        ]);
    }

    public function getPosts(){
        return Post::latest()->filter(request(['search']));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $atributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'categorie_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $atributes['user_id'] = auth()->id();

        Post::create($atributes);

        return redirect('/posts');
    }
}

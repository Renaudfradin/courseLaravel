<?php

use App\Models\Categorie;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function (){
    $posts = Post::latest('created_at')->get();
    return view('posts',[
        'posts' => $posts,
        'categories' => Categorie::all()
    ]);
});

Route::get('/post/{post}', function (Post $post){
    return view('post',[
        'post' => $post
    ]);
});


Route::get('/categorie/{categorie}', function (Categorie $categorie){
    return view('posts',[
        'posts' => $categorie->posts,
        'categories' => Categorie::all()
    ]);
});


Route::get('/authors/{user}', function (User $user){
    return view('posts',[
        'posts' => $user->posts,
        'categories' => Categorie::all()
    ]);
});
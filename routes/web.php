<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    
    $posts = Post::all();

    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('/post/{post}', function ($slug){
    $post = Post::findOrFail($slug);

    return view('post',[
        'post' => $post
    ]);
});

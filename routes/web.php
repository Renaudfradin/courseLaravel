<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/posts', [PostController::class, 'index']);

Route::get('/post/{post}', [PostController::class, 'show']);


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

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'login'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy']);
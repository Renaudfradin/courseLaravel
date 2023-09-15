<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $atributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' =>'max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|min:3|unique:users,email',
            'password' => 'required|max:255|min:5'
        ]);

        $user = User::create($atributes);

        auth()->login($user);

        return redirect('/posts')->with('success','users enregistre');
    }
}

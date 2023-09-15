<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(){
       auth()->logout();

       return redirect('/posts');
    }

    public function create(){
        return view('session.login');
    }

    public function login(){
        $atributes = request()->validate([
            'email' => 'required|email|exists:users,email|max:255|min:3',
            'password' => 'required|max:255|min:5'
        ]);

        if (!auth()->attempt($atributes)) {
            throw ValidationException::withMessages([
                'email'=>'email ou password invalide'
            ]);
        }
        
        session()->regenerate();

        return redirect('/posts')->with('success', 'connect');

    }
}

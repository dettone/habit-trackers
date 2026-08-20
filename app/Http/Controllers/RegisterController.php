<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;



class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function store(RegisterRequest $request){
    
       $user =  \App\Models\User::query()->create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        );

    Auth::login($user);

    return redirect()->route('site.dashboard');
    }
}

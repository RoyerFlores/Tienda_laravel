<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:8',
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);
        return redirect()->to('/');
    }
}

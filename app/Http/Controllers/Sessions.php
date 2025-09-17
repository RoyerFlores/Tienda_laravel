<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class Sessions extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        if (!Auth::attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Email o contraseña incorrectos',
            ]);
        }

        return redirect()->to('/dashboard');
    }

    public function destroy(){
        Auth::logout();
        return redirect()->to('/');
    }
}

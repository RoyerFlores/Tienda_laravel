<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            //mensaje si se intenta acceder a una página sin iniciar sesión
            session()->flash('error', 'Debes iniciar sesión para acceder a esta página.');
            
            return route('login');
        }
        
        return null;
    }
}
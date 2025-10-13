<?php

namespace App\Http\Middleware;

use Closure;

class ChatifyAuth
{
    public function handle($request, Closure $next)
    {
        // Check your custom session
        if(session('user_id') && session('role')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Login required to access chat');
    }

    
}

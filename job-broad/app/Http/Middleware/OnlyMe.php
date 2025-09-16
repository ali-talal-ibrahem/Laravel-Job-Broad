<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->email === 'ali@gmail.com')
                {
                    // Allow The Request
                    return $next($request);
                }
                return response(['message' => 'Access is not proper !'], 403);
        }

        return redirect('/login');
    }
}

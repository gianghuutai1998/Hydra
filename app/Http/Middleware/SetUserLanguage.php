<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetUserLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $language = $user->language ?? 'vi';
        App::setlocale($language);

        return $next($request);
    }
}

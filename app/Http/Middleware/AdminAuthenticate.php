<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Http\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->authenticate($request);
        $user = Auth::user();
        $allow_type = [1];
        if (! in_array($user->type, $allow_type)) {
            throw new UnauthorizedHttpException('jwt-auth', __('unauthorized!'));
        }
        return $next($request);
    }
}

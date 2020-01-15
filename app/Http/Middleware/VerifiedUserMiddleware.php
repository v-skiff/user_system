<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class VerifiedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->verified == 1) {
            $user->code = null;
            $user->save();
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/');
        }
    }
}

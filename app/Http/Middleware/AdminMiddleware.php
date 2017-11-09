<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class AdminMiddleware
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
        if ($user = $request->user()) {
            if ($user->type != 'A') {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

        return $next($request);
    }
}

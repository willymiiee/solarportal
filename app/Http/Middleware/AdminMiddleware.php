<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

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
                return abort(403, 'You dont have access to this page');
            }
        } else {
            return abort(403, 'You dont have access to this page');
            // return redirect('/login');
        }

        return $next($request);
    }
}

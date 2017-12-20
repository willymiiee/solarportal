<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class ParticipantMiddleware
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
            if ($user->type != 'V') {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

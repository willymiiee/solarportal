<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

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
        $user = $request->user();
        if (!$user || $user->type != 'V') {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

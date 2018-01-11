<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = auth()->user();

            if ($user->type == 'V') {

                // check if there are invitation link
                if ($company_id = request('ref_company')) {
                    $user->addCompany($company_id);

                    return redirect()->route('participant.company.index')->withMessage([
                        'type' => 'success',
                        'message' => 'Invitation successfully!',
                    ]);
                }

                return redirect()->route('participant.dashboard');
            }

            return redirect('/');
        }

        return $next($request);
    }
}

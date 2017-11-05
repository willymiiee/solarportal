<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function getVerify($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if ($user) {
            $user->confirmation_code = null;
            $user->confirmed_at = Carbon::now();
            $user->save();

            \Auth::guard()->login($user);

            return redirect('/');
        }

        dd('Confirmation code doesn\'t match');
    }
}

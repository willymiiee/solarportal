<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

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

    public function getProfile()
    {
        if (\Auth::check()) {
            $user = \Auth::user();

            return view('profile')->with(
                [
                    'data' => $this->data,
                    'user' => $user
                ]
            );
        }

        return redirect('/')->with('error', 'Please login first!');
    }

    public function postProfile(Request $request)
    {
        User::where('id', \Auth::user()->id)
            ->update(
                [
                    'name' => $request->has('name') ? $request->get('name') : \Auth::user()->name,
                    'email' => $request->has('email') ? $request->get('email') : \Auth::user()->email,
                    'phone' => $request->has('phone') ? $request->get('phone') : \Auth::user()->phone,
                    'address' => $request->has('address') ? $request->get('address') : \Auth::user()->address
                ]
            );

        return back()->with('success', 'Success update profile');
    }

    public function getChangePassword()
    {
        if (\Auth::check()) {
            $user = \Auth::user();

            return view('change-password')->with(
                [
                    'data' => $this->data,
                    'user' => $user
                ]
            );
        }

        return redirect('/')->with('error', 'Please login first!');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate(
            [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed'
            ]
        );

        if (bcrypt($request->get('old_password')) == \Auth::user()->password) {
            User::where('id', \Auth::user()->id)
                ->update(
                    [
                    'password' => bcrypt($request->get('password'))
                    ]
                );

            return back()->with('success', 'Success update password');
        } else {
            return back()->withErrors(
                [
                    'password' => 'Wrong Old Password'
                ]
            );
        }
    }
}

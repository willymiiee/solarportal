<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

            // redirect for admin
            switch ($user->type) {
            case 'A':
                return redirect('/admin'); // redirect for admin

            case 'V':
                return redirect()->route('participant.dashboard'); // redirect for vendor/participant

            default:
                return redirect('/'); // redirect for customer
            }
        }

        return redirect('/')->with('errors', 'Confirmation code doesn\'t match!');
    }

    public function getProfile()
    {
        if (\Auth::check()) {
            $user = \Auth::user();

            return view('profile')->with(
                [
                    'data' => $this->data,
                    'user' => $user,
                ]
            );
        }

        return redirect('/')->with('errors', 'Please login first!');
    }

    public function postProfile(Request $request)
    {
        $data = $request->except('_token');
        User::where('id', \Auth::user()->id)
            ->update($data);

        return back()->with('success', 'Success update profile');
    }

    public function getChangePassword()
    {
        if (\Auth::check()) {
            $user = \Auth::user();

            return view('change-password')->with(
                [
                    'data' => $this->data,
                    'user' => $user,
                ]
            );
        }

        return redirect('/')->with('errors', 'Please login first!');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if (password_verify($request->get('old_password'), \Auth::user()->password)) {
            User::where('id', \Auth::user()->id)
                ->update(
                    [
                        'password' => bcrypt($request->get('password')),
                    ]
                );

            return back()->with('success', 'Success update password');
        } else {
            return back()->withErrors(
                [
                    'password' => 'Wrong Old Password',
                ]
            );
        }
    }

    public function postLostPassword(Request $request)
    {
        $checkEmail = User::where('email', $request->get('email'))->first();

        if ($checkEmail) {
            $checkEmail->lost_password = str_random(30);
            $checkEmail->save();

            $emailData = json_encode(
                [
                    '-resetUrl-' => url('reset-password') . '/' . $checkEmail->lost_password,
                ]
            );

            sendMail(
                'noreply@sejutasuryaatap.com',
                'noreply',
                $checkEmail->email,
                $checkEmail->name,
                'Reset password',
                null,
                $emailData,
                null,
                '5408f8fd-e74a-4435-864f-a77bc3b2e8ff'
            );

            return response(['message' => "We've sent the link to your email"]);
        }

        return response(['errors' => 'Email not found'], 500);
    }

    public function getResetPassword($code)
    {
        $user = User::where('lost_password', $code)->first();

        if ($user) {
            $user->lost_password = null;
            $user->save();

            return view('reset-password')->with(
                [
                    'data' => $this->data,
                    'user' => $user,
                ]
            );
        }

        return redirect('/');
    }

    public function postResetPassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        $user = User::find($request->get('user_id'));

        if ($user) {
            $user->password = bcrypt($request->get('password'));
            $user->save();

            \Auth::guard()->login($user);

            return redirect('/')->with('success', 'Success update password');
        }
    }

    public function postAlternateLogin(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        \Auth::login($user);
        return response()->json($user);
    }
}

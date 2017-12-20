<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override login function
    public function login()
    {
        if (\Auth::attempt([
            'email' => request('email'),
            'password' => request('password'),
            'confirmation_code' => null,
        ])) {
            $user = \Auth::user();

            if ($user->type == 'A') {
                $redirect = 'admin/home';
            } elseif ($user->type == 'V') {
                $redirect = route('participant.dashboard');
            } else {
                $redirect = 'profile';
            }

            return redirect($redirect);

            // $http = new \GuzzleHttp\Client;
            // $response = $http->post(url('oauth/token'), [
            //     'form_params' => [
            //         'grant_type' => 'password',
            //         'client_id' => 2,
            //         'client_secret' => env('SECRET_KEY', ''),
            //         'username' => request('email'),
            //         'password' => request('password'),
            //         'scope' => '*',
            //     ],
            // ]);

            // $response = json_decode((string) $response->getBody(), true);

            // return redirect($redirect)->cookie('auth_token', $response['access_token']);
        }

        return back()->withErrors(
            [
                'login' => 'Wrong credentials!',
            ]
        );
    }
}

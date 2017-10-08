<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

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
        if (\Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = \Auth::user();
            $http = new \GuzzleHttp\Client;
            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => 'FV4MUc6jrd3bgbeuCn8p1LYWZpBSVj7YnHHSL9YD',
                    'username' => request('email'),
                    'password' => request('password'),
                    'scope' => '*',
                ],
            ]);

            $response = json_decode((string) $response->getBody(), true);
        }

        return redirect(url('admin/home'))->cookie('auth_token', $response['access_token']);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = $this->broker()->getUser($request->only('email'));

        if (!$user) {
            return back()->withInput()->withErrors([
                'email' => 'We couldnt found this email',
            ]);
        }

        $token = $this->broker()->createToken($user);
        $resetUrl = url(config('app.url') . route('password.reset', $token, false));
        $emailData = json_encode([
            '-resetUrl-' => $resetUrl,
        ]);

        sendMail(
            'noreply@sejutasuryaatap.com',
            'noreply',
            $request->get('email'),
            'Request reset password',
            'Reset Password',
            null,
            $emailData,
            null,
            '5408f8fd-e74a-4435-864f-a77bc3b2e8ff'
        );

        return back()->with('status', trans('passwords.sent'));
    }
}

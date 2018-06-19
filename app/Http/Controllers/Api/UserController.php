<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $_statusCode;
    private $_message;
    private $_status;
    private $_result;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_statusCode = 500;
        $this->_status = false;
        $this->_message = 'Error';
        $this->_result = [
            'status' => $this->_status,
            'message' => $this->_message
        ];
    }

    public function postProfile(Request $request)
    {
        if (\Auth::check()) {
            $data = $request->except('_token');
            User::where('id', \Auth::user()->id)
                ->update($data);

            $this->_statusCode = 200;
            $this->_status = true;
            $this->_message = 'Success update profile';
        }

        return response()->json($this->_result, $this->_statusCode);
    }

    public function postChangePassword(Request $request)
    {
        $request->validate(
            [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed'
            ]
        );

        if (password_verify($request->get('old_password'), \Auth::user()->password)) {
            User::where('id', \Auth::user()->id)
                ->update(
                    [
                    'password' => bcrypt($request->get('password'))
                    ]
                );

            $this->_statusCode = 200;
            $this->_status = true;
            $this->_message = 'Success update password';
        } else {
            $this->_message = 'Wrong old password';
        }

        return response()->json($this->_result, $this->_statusCode);
    }

    public function postLostPassword(Request $request)
    {
        $this->_message = 'Email not found';
        $checkEmail = User::where('email', $request->get('email'))->first();

        if ($checkEmail) {
            $checkEmail->lost_password = str_random(30);
            $checkEmail->save();

            $emailData = json_encode(
                [
                    '-resetUrl-' => url('reset-password').'/'.$checkEmail->lost_password
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

            $this->_statusCode = 200;
            $this->_status = true;
            $this->_message = 'Success send link';
        }

        return response()->json($this->_result, $this->_statusCode);
    }

    public function postResetPassword(Request $request)
    {
        $request->validate(
            [
            'password' => 'required|string|min:6|confirmed'
            ]
        );

        $user = User::find($request->get('user_id'));

        if ($user) {
            $user->password = bcrypt($request->get('password'));
            $user->save();

            \Auth::guard()->login($user);

            $this->_statusCode = 200;
            $this->_status = true;
            $this->_message = 'Success update password';
        }

        return response()->json($this->_result, $this->_statusCode);
    }

    public function getCheckUser(Request $request)
    {
        if (\Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'confirmation_code' => null
        ])) {
            $user = \Auth::user();
        } else {
            return response()->json([
                'error' => 'Wrong credentials!'
            ], 500);
        }

        return $user;
    }
}

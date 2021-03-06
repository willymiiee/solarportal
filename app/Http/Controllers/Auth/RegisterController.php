<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'register-thankyou';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $data = [
            'list_main_domicile' => getMainDomicileDropdown(),
        ];

        return view('auth.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => array_key_exists('type', $data) ? $data['type'] : 'C',
            'password' => bcrypt($data['password']),
            'confirmation_code' => str_random(30),
            'phone' => $data['phone'],
            'main_domicile' => $data['main_domicile'],
        ]);

        $emailData = json_encode(
            [
                '-verifyUrl-' => url('user/verify') . '/' . $user->confirmation_code,
            ]
        );

        // in case if user join via invitation link
        if (!request('ref_company')) {
            sendMail(
                'noreply@sejutasuryaatap.com',
                'noreply',
                $user->email,
                $user->name,
                'Please activate your account',
                null,
                $emailData,
                null,
                'cca4c8f6-f7dd-41f0-bc15-6feabfecc472'
            );
        }

        return $user;
    }

    /**
     * Override register so user won't auto login
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // in case if user join via invitation link
        if ($company_id = request('ref_company')) {
            $user->confirmation_code = null;
            $user->confirmed_at = now();
            $user->save();

            $user->addCompany($company_id);

            auth()->loginUsingId($user->id, true);

            return redirect()->route('participant.dashboard')->withMessage([
                'type' => 'success',
                'message' => 'Invitation successfully!',
            ]);
        }

        return redirect($this->redirectPath());
    }
}

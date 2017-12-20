<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = [
            'title' => 'Edit Profile',
        ];

        return view('participant::profile', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'main_domicile' => 'required',
        ]);

        $user = auth()->user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.edit')->withMessage([
            'type' => 'success',
            'message' => 'Profile updated successfully!',
        ]);
    }

    public function password()
    {
        $data = [
            'title' => 'Edit Password',
        ];

        return view('participant::password', $data);
    }

    public function updatePassword(Request $request)
    {
        if (!Hash::check($request->current_password, $request->user()['password'])) {
            $msg = (new MessageBag)->add('current_password', 'Your current password is wrong');
            return back()->withInput()->withErrors($msg);
        }

        $this->validate($request, [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.password')->withMessage([
            'type' => 'success',
            'message' => 'Password updated successfully!',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = [
            'title' => 'Edit Profile',
            'user' => auth()->user(),
        ];

        return view('participant::profile', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'image',
            'phone' => 'required',
            'main_domicile' => 'required',
        ]);

        $user = auth()->user();
        $user->fill($request->all());

        if ($file = $request->file('avatar')) {
            $avatar = $this->_uploadAvatar($file, $user['avatar']);
            if (!$avatar) {
                $msg = (new MessageBag)->add('avatar', 'Your profile picture photo are invalid, try again');
                return back()->withInput()->withErrors($msg);
            }

            $user->avatar = $avatar;
        }

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

    /**
     * Handle upload image for Avatar
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  string       $previousFile
     * @return string       [filename]
     */
    protected function _uploadAvatar($file, $previousFile)
    {
        if (!$file->isValid()) {
            return false;
        }

        $ext = $file->getClientOriginalExtension();
        $image = Image::make($file);
        $path = $file->hashName('public/avatars');

        Storage::put($path, (string) $image->encode($ext, 30));

        // if new file uploaded successfully, delete previous file
        if (Storage::exists($path)) {
            Storage::delete('public/avatars/' . $previousFile);
        }

        return basename($path);
    }
}

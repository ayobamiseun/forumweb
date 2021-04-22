<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Delete user's profile picture
     */
    public function deleteProfilePicture()
    {
        $user = Auth::user();
        $path = public_path('/img/profile/' . $user->id . '.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION'));
        $path_small = public_path('/img/profile/' . $user->id . '-s.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION'));
        if (file_exists($path)) {
            unlink($path);
        }
        if (file_exists($path_small)) {
            unlink($path_small);
        }

        return redirect()->route('profile.edit');
    }

    /**
     * Show form to edit user profile
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Show form to edit password
     */
    public function editPassword()
    {
        return view('user.password.edit');
    }

    /**
     * Show user's profile
     */
    public function index(User $user = Null)
    {
        if (!$user) {
            $user = Auth::user();
        }

        if ($user) {
            if ($user->is_administrator) {
                return redirect()->route('index');
            }

            return view('user.index', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show user's activity (topics or posts)
     */
    public function showActivity(Request $request, User $user)
    {
        if ($request->route()->named('profile.topics')) {
            $type = 'topics';
            $items = $user->topics()->paginate(\Config::get('constants.PAGINATION_PER_PAGE'));
        } else {
            $type = 'posts';
            $items = $user->posts()->paginate(\Config::get('constants.PAGINATION_PER_PAGE'));
        }

        return view('user.activity', [
            'user'  => $user,
            'type'  => $type,
            'items' => $items
        ]);
    }

    /**
     * Update user's values in the database
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'user_name'     => 'required|alpha_num|between:6,25|unique:users,user_name,' . $user->id,
            'email'         => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user = Auth::user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->signature = (empty($request->input('signature')) ? NULL : $request->input('signature'));
        $user->save();

        return redirect()->route('profile')->with('message', 'Profile updated');
    }

    /**
     * Update users' password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'old_password'              => 'required|string|different:new_password',
            'new_password'              => 'required|string|between:6,100|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);

        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            \Session::flash('message', 'Password updated');

            return redirect()->route('profile.edit');
        } else {
            return redirect()
                    ->route('profile.password.edit')
                    ->withErrors(['old_password' => 'Invalid password'])
                    ->withInput($request->only('old_password', 'new_password', 'new_password_confirmation'));
        }
    }

    /**
     * Upload a new profile picture
     */
    public function uploadProfilePicture(Request $request)
    {
        $this->validate($request, [
            'picture'  => 'required|image'
        ]);

        $image = $request->file('picture');
        $filename = public_path('img/profile/' . Auth::user()->id . '%s.png');
        $image_size = getimagesize($image->getRealPath());

        if ($image_size[0] < $image_size[1]) {
            Image::make($image->getRealPath())->widen(config('constants.PROFILE_PICTURE_SMALL_SIZE'))->crop(config('constants.PROFILE_PICTURE_SMALL_SIZE'), config('constants.PROFILE_PICTURE_SMALL_SIZE'))->save(sprintf($filename, '-s'));
            Image::make($image->getRealPath())->widen(config('constants.PROFILE_PICTURE_SIZE'))->crop(config('constants.PROFILE_PICTURE_SIZE'), config('constants.PROFILE_PICTURE_SIZE'))->save(sprintf($filename, ''));
        } else {
            Image::make($image->getRealPath())->heighten(config('constants.PROFILE_PICTURE_SMALL_SIZE'))->crop(config('constants.PROFILE_PICTURE_SMALL_SIZE'), config('constants.PROFILE_PICTURE_SMALL_SIZE'))->save(sprintf($filename, '-s'));
            Image::make($image->getRealPath())->heighten(config('constants.PROFILE_PICTURE_SIZE'))->crop(config('constants.PROFILE_PICTURE_SIZE'), config('constants.PROFILE_PICTURE_SIZE'))->save(sprintf($filename, ''));
        }

        return redirect()->route('profile.edit');
    }
}

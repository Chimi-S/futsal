<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MainUserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return Redirect()->route('welcome');
    }
    public function userProfile()
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('user.profile.view_profile', compact('user'));
    }
    public function userProfileEdit()
    {
        $id = Auth::user()->id;

        $editProfile = User::find($id);

        return view('user.profile.edit_profile', compact('editProfile'));
    }
}

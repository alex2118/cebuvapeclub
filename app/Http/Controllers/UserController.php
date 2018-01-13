<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profile($username)
    {
      $user = User::where('username', $username)->first();

      return view('users.profile', compact('user'));
    }

    public function settings()
    {
      return view('users.settings');
    }
}

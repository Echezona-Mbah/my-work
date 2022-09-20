<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
          'username'  => 'required|max:255|email',
          'password' => 'required|confirmed',
      ]);

          return redirect()->back();

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function login() {
        return view('login');
    }

    public function loginProcess(LoginRequest $request) {

        $remember = ($request->remember == 'on') ? true : false;

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $remember)) {
            return redirect()->route('home');
        } else {
            return back()->with('danger', 'خطأ فى إسم المستخدم أو كلمة المرور');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

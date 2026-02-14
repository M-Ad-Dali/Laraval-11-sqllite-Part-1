<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $attributes = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)){ // [يأخذ كلمة المرور (Plain text) ويقوم بتشفيرها ومقارنتها بالنسخة المشفرة في قاعدة البيانات تلقائياً. إذا تطابقوا، يتم تسجيل دخول المستخدم.]
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match .',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}

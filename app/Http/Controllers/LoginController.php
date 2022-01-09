<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'], // validasi bisa pakai request jika ingin atau jika ada user yang bisa menmbabahkan user lain
        ]);
        if (Auth::attempt($attributes)) {
            return redirect('/')->with('success', 'anda sudah login');
        }
        throw ValidationException::withMessages([
            'email' => 'data yang anda masukan tidak tepat'
        ]);
    }
}

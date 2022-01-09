<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegistrationRequest $request)
    {
        User::create($request->all());
        return redirect('/')->with('success', 'data berhasil dimasukan');
    }
}

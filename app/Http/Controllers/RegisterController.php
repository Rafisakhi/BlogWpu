<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
       $validateData = $request->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|min:4|max:255|unique:users',
            'email' => 'required|min:10|max:255|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        // $request->session()->all('success', 'Berhasil Registrasi');

        return redirect('/login')->with('success', 'Registrasion Successfull Silahkan login!');
    }
}

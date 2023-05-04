<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'register'
        ]);
    }

    public function edit()
    {
        return view('register.edit',[
            'title' => 'Edit Profile'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:App\Models\admin',
            'username' => 'required|min:3|max:255|unique:App\Models\admin',
            'email' => 'required|email:dns|unique:App\Models\admin',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin')->with('success', 'Data Berhasil Ditambahkan!');
    }
}

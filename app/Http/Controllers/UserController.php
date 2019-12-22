<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = request()->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
        ], [
            'name.required' => 'Name is needed',
            'password.required' => 'Password is needed',
        ]);

        $input = request()->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return back()->with('success', 'User created successfully.');
    }
}

<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        // Page Information
        $page_title = 'Register';
        $page_description = "Register an Account";

        // Elements
        $header = false;
        $bottom = false;

        return view('authentication/register/index', compact('page_title', 'page_description', 'header', 'bottom'));
    }

    public function store(Request $request)
    {
        // return $request;
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'unique:users'],
            'password' => 'required|min:5|max:255',
       ]);

       $validatedData['password'] = Hash::make($validatedData['password']);

       User::create($validatedData);

       return redirect('/login')->with('success', 'Registration Success!');
    }
}

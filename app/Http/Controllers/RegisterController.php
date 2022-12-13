<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:5|max:100|unique:users|alpha_dash',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:100'
        ]);

        $validatedData['name'] = ucwords($request->name);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'New Account has been added');
    }

    public function librarian()
    {
        if (auth()->user()->roles == 'librarian' || auth()->user()->roles == 'admin') {
            return redirect('/dashboard/books');
        } else {
            return view('register.librarian', [
                'title' => 'Become a Librarian'
            ]);
        }
    }

    public function librarian_up(Request $request)
    {
        $validatedData = $request->validate([
            'roles' => 'required',
        ]);

        $validatedData['roles'] = 'librarian';
        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('/dashboard/books')->with('success', "Congratulations, you've become a Librarian");
    }
}

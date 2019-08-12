<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('profile.create', compact('user'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'bio' => 'sometimes',
            'website' => 'sometimes',
            'phone' => 'sometimes',
            'gender' => 'required',
        ]);
        unset($data['name'], $data['email'], $data['username']);
        Auth::user()->profile()->create($data);
        return redirect('/profile');
    }
    public function edit()
    {
        return view('profile.edit');
    }
}

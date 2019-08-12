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
        $user_id = Auth::id();
        return redirect("/profile/$user_id");
    }



    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
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
        Auth::user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
        ]);
        Auth::user()->profile->update([
            'bio' => $data['bio'],
            'website' => $data['website'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
        ]);
        return redirect('/profile/' . Auth::id());
    }
}

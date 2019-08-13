<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
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
        /*

            THIS LOGIC IS BEING USED AT REGISTRATION STAGE IN THE REGISTRATION CONTROLLER

            */

        // $data = $this->validateRequest($request);
        // unset($data['name'], $data['email'], $data['username']);
        // $imagePath = $data['image']->store('uploads/profiles', 'public');
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image->save();
        // Auth::user()->profile()->create([
        //     'bio' => $data['bio'],
        //     'website' => $data['website'],
        //     'phone' => $data['phone'],
        //     'gender' => $data['gender'],
        //     'image' => $imagePath,
        // ]);
        // $user_id = Auth::id();
        // return redirect("/profile/$user_id");
    }



    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $data = $this->validateRequest($request);
        $imagePath = $data['image']->store('uploads/profiles', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
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
            'image' => $imagePath,
        ]);
        return redirect('/profile/' . Auth::id());
    }


    protected function validateRequest($incomingRequest)
    {

        return $incomingRequest->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'bio' => 'sometimes',
            'website' => 'sometimes',
            'phone' => 'sometimes',
            'gender' => 'required',
            'image' => 'sometimes',
        ]);
    }
}

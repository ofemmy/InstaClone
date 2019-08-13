<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Post;

class PostController extends Controller
{
    protected $guarded = [];


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $imagePath = $data['image']->store('uploads/posts', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('profile/' . Auth::id());
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image', 'file', 'max:5000'],
        ]);
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row mb-3 d-flex justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center">Welcome {{$user->name}}</h2>
        </div>
    </div>
    @if (count($user->posts) > 0)
    @foreach ($user->posts as $post)
    <div class="row mb-5 d-flex justify-content-center">
        <div class="card" style="width: 45rem;">
            <img class="card-img-top" src={{asset('storage/'.$post->image)}} alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{$post->caption}}</p>
                <div>
                    <span>4 Likes</span>
                    <span>5 Comments</span>
                    <span>4 Likes</span>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-md-12">
            <h3>Get Started</h3>
            <a href="/post/create" class="btn btn-primary mx-2">Add Your First Post</a>
            <a href="/profile/create" class="btn btn-info">Update Your Profile</a>
        </div>
    </div>
    @endif

</div>
@endsection

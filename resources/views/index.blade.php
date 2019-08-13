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
            <div class="card-header bg-transparent d-flex justify-content-start align-items-center">
                @if (auth()->user()->profile->image)
                <img src="{{asset('storage/' .Auth::user()->profile->image) }}"
                    style="width: 40px; height: 40px; border-radius: 50%;" class="mr-3">
                @endif
                <p><strong>{{$user->username}}</strong></p>
            </div>
            <img class="card-img-top" src={{asset('storage/'.$post->image)}} alt="Card image cap">
            <div class="card-body">
                <div class="d-flex">
                    <p class="font-weight-bold mr-4">{{$user->username}}</p>
                    <p class="card-text">{{$post->caption}}</p>
                </div>
                <div>
                    <span>4 Likes</span>
                    <span>5 Comments</span>
                    <span>4 Likes</span>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <form action="" class="w-100">
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <a href="#" class="btn btn-primary">Comment</a>
                </form>
            </div>


        </div>
    </div>
    @endforeach
    @else
    <div class="row mb-5 d-flex justify-content-center">
        <div class="col-md-12">
            <h3>Get Started</h3>
            <a href="/post/create" class="btn btn-primary mx-2">Add Your First Post</a>
            <a href={{route('profile.edit',['user'=>$user->id])}} class="btn btn-info">Update Your Profile</a>
        </div>
    </div>
    @endif

</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4 px-5">
        <img src={{asset('storage/'. $user->profile->image)}} alt="" class="rounded-circle w-100">
    </div>
    <div class="col-md-8 d-flex-column justify-content-center align-items-center">
        <div>
            <h1>{{$user->username}}</h1> <span><a href="/profile/{{$user->id}}/edit">Edit Profile</a></span>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div><strong>{{count($user->posts)}} Posts</strong></div>
            <div><strong>22 followers</strong> </div>
            <div><strong>100 following</strong></div>
        </div>
        <hr>
        <div>
            <h3>{{$user->name}}</h3>
            <p class="lead">{{$user->profile->bio}}</p>
            @if($user->profile->website)
            <p><a href="#">{{$user->profile->website}}</a></p>
            @endif
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    {{-- @foreach ($user->posts as $post )
    <div class="col-md-4 pb-4">
        <a href="/post/{{$post->id}}">
    <img src="/storage/{{$post->image}}" class="w-100" alt="">
    </a>
</div>
@endforeach --}}

@if (count($user->posts)>0)
@foreach ($user->posts as $post )
<div class="col-md-4 pb-4">
    <a href="/post/{{$post->id}}">
        <img src="/storage/{{$post->image}}" class="w-100" alt="">
    </a>
</div>
@endforeach

@else
<div class="col-md-12">
    <p>No posts yet</p>
    <a href="/post/create" class="btn btn-primary">Create Your First Post</a>

</div>
@endif
</div>
@endsection

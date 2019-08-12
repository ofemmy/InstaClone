@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Welcome {{$user->name}}</h2>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Get Started</h3>
            <a href="#" class="btn btn-primary mx-2">Add Your First Post</a>
            <a href="/profile/create" class="btn btn-info">Update Your Profile</a>
        </div>
    </div>
</div>
@endsection

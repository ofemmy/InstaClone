@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-7">
        <img src={{asset('storage/'. $post->image)}} alt="" class="w-100 h-100">
    </div>
    <div class="col-md-5">
        <h3>{{$post->username}}</h3>
        <p class="lead">
            {{$post->caption}}
        </p>
    </div>
</div>
@endsection

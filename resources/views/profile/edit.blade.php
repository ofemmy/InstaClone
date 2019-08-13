@extends('layouts.app')
@section('content')
<h3>Edit Profile</h3>
<form action='/profile/{{$user->id}}' method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-8">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') ?? $user->name}}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- User Name --}}
    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

        <div class="col-md-8">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username') ?? $user->username }}" required autocomplete="username"
                autofocus>

            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Email --}}
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') ?? $user->email}}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Phone Number --}}
    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-8">
            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ old('phone') ?? $user->profile->phone }}" required autocomplete="phone">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Website --}}

    <div class="form-group row">
        <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

        <div class="col-md-8">
            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website"
                value="{{ old('website') ?? $user->profile->website }}" required autocomplete="website" autofocus>

            @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Bio --}}

    <div class="form-group row">
        <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

        <div class="col-md-8">
            <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio"
                value="{{ old('bio') ?? $user->profile->bio }}" required autocomplete="bio"
                autofocus>{{$user->profile->bio}}</textarea>

            @error('bio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Gender --}}

    <div class="form-group row">
        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
        <div class="col-md-8">
            <select class="form-control" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>
        <div class="col-md-6">
            <input type="file" class="form-control-file" id="image"
                class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"
                autocomplete="image">
            @error('image')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </div>
    </div>


</form>
@endsection

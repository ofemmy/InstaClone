@extends('layouts.app')
@section('content')
<h3>Create New Post</h3>
<form action="/post" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group row">
        <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

        <div class="col-md-8">
            <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                name="caption" value="{{ old('caption')}}" required autocomplete="caption" autofocus></textarea>
            @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
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
            <button type="submit" class="btn btn-danger">
                {{ __('Upload') }}
            </button>
        </div>
    </div>

</form>
@endsection

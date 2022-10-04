@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($post->status !== 1)
                <div class="alert alert-info" role="alert">
                    {{ __('This post is a draft.') }}
                </div>
            @endif
                <div class="float-start">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">< Back to list</a>
                </div>
            <div class="col-md-12">
                    @include('posts.details')
            </div>
        </div>
    </div>
@endsection

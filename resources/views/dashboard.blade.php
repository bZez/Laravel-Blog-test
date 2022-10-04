@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 text-end">
                <a href="{{route('posts.create')}}" class="btn btn-outline-secondary"> + New post</a>
            </div>
            <div class="col-md-12">
                @foreach ($posts as $post)
                    @include('posts.details')
                @endforeach
            </div>
        </div>
    </div>
@endsection

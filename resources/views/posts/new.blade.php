@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$post->title ?? 'New post'}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (isset($post))
                    <!-- Le formulaire est géré par la route "posts.update" -->
                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @else
                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label>Publish ?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" type="checkbox" role="switch" value="1" id="status" @if($post->status ?? false) checked @endif>
                                        <label class="form-check-label" for="status">Draft/Published</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                            <input type="text" id="title" name="title"
                                                                      class="form-control" required=""
                                                                      value="{{ $post->title ?? old('title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="post_content">Content</label>
                                    <textarea id="post_content" name="post_content" class="form-control">{{ $post->content ?? old('content') }}</textarea>
                                </div>
                                @if(isset($post->image))
                                    <p>
                                        <span>Actual image</span><br/>
                                        <img src="{{ asset('images/'.$post->image) }}"
                                             alt="image de couverture actuelle" style="max-height: 200px;" >
                                    </p>
                                @endif
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <a href="{{ route('dashboard') }}" class="btn btn-danger">< Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
            </div>
        </div>
    </div>

@endsection

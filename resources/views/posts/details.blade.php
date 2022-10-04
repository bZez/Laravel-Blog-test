<div class="mx-auto my-3">
    <div class="row bg-white overflow-hidden shadow-sm p-3 rounded">
        <div class="col-12 p-6 bg-white border-b border-gray-200 rounded">
            <h1 class="h1 mb-0">{{ $post->title }}</h1>
            <small>{{$post->created_at->toDateTimeLocalString()}} by {{ $post->user->name }}</small>
            @if(Route::getCurrentRoute()->getName() == 'posts.show')
                @if($post->image)
                    <img src="{{ asset('images/' . $post->image) }}" class="mx-auto w-25 d-block my-5" alt="Responsive image">
                @endif
                <p class="bg-light p-3 rounded" style="overflow-wrap: break-word;">{{ $post->content }}</p>
            @endif

            <div class="float-end">
                @if(Route::getCurrentRoute()->getName() !== 'posts.show')
                    <a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">Details...</a>
                @endif
                @if(Auth::user() && $post->user_id == Auth::user()->id)
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</div>

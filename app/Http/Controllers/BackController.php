<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'posts' => Post::all()->sortByDesc('created_at'),
        ]);
    }

    public function new()
    {
        return view('posts.new');
    }

    public function edit(Post $post)
    {
        return view('posts.new', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'post_content' => 'required',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image',
        ];
        $this->validate($request, $rules);
        if ($request->has('image')) {
            Storage::delete(public_path('images').'/'.$post->image);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $post->update([
            'title' => $request->title,
            'image' => $imageName ?? $post->image,
            'content' => $request->post_content,
            'status' => $request->status ?? Post::STATUS_DRAFT,
        ]);

        return redirect()->route('posts.show', [
            'post' => $post,
        ])->with([
            'success' => 'Post updated successfully',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'status' => 'nullable|boolean',
            'image' => 'nullable|image',
        ];
        $this->validate($request, $rules);
        $post = new Post();
        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->title = $request->title;
        $post->content = $request->post_content;
        $post->status = $request->status ?? Post::STATUS_DRAFT;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('dashboard')->with('success', 'You have successfully create a post.');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return back()->with('success', 'You have successfully delete a post.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FrontController extends Controller
{
    public function index()
    {
        return view('home', [
            'posts' => Post::all()
                ->where('status', '=', true)
                ->sortByDesc('created_at'),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}

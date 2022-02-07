<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function home()
    {
        $posts = Post::all();

        return view('pages.home', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::all();

        return view('pages.posts', compact('posts'));
    }

    public function create() {

        return view('pages.create');
    }

    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'subtitle' => 'string|max:30',
            'author' => 'required|string',
            'text' => 'required|max:350'
        ]);

        $post = Post::create($data);

        return redirect() -> route('posts');
    }
}
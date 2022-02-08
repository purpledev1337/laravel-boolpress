<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class GuestController extends Controller
{
    public function home()
    {
        $posts = Post::all();

        return view('pages.home', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc') -> get();
        $cats = Cat::all();

        return view('pages.posts', compact('posts', 'cats'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;
use App\Reaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create() {

        $cats = Cat::all();
        $reactions = Reaction::all();

        return view('pages.create', compact('cats', 'reactions'));
    }

    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'subtitle' => 'nullable|string|max:120',
            'text' => 'required|max:350'
        ]);

        $data['user_id'] = Auth::user() -> id;

        $post = Post::make($data);
        $category = Cat::findOrFail($request -> get('cat'));

        $post -> cat() -> associate($category);
        $post -> save();

        $reactions = Reaction::findOrFail($request -> get('reactions'));
        $post -> reactions() -> attach($reactions);
        $post -> save();

        return redirect() -> route('posts');
    }
}

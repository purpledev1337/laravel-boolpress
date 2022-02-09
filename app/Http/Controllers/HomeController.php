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

        $reactions = [];
        if ($request -> has('reactions')){
            $reactions = Reaction::findOrFail($request -> get('reactions'));
        }
        $post -> cat() -> associate($category);
        $post -> save();

        $post -> reactions() -> attach($reactions);
        $post -> save();

        return redirect() -> route('posts');
    }

    public function edit($id) {
        
        $cats = Cat::all();
        $reactions = Reaction::all();
        $post = Post::findOrFail($id);        
        
        return view('pages.edit', compact('cats', 'reactions', 'post'));
    }

    public function update(Request $request, $id) {

        $data = $request -> validate([
            'title' => 'required|string|max:60',
            'subtitle' => 'nullable|string|max:120',
            'text' => 'required|max:350'
        ]);
        $data['user_id'] = Auth::user() -> id;
        
        $post = Post::findOrFail($id);
        $post -> update($data);
        
        $category = Cat::findOrFail($request -> get('cat'));
        $post -> cat() -> associate($category);
        $post -> save();

        $reactions = [];
        if ($request -> has('reactions')){
            $reactions = Reaction::findOrFail($request -> get('reactions'));
        }
        $post -> reactions() -> sync($reactions);
        $post -> save();

        return redirect() -> route('posts');
    }

    public function delete($id) {

        $post = Post::findOrFail($id);
        $post -> reactions() -> sync([]);
        $post -> save();

        $post -> delete();

        return redirect() -> route('posts');
    }
}

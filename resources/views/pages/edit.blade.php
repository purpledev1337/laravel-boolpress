@extends('layouts.main-layout')

@section('content')
    
<h1>Update post</h1>
<br><br><br>

    <form action="{{ route('update', $post -> id) }}" method="POST">

        @method("POST")
        @csrf

        <label for="title">Title:</label><br>
        <textarea id="title" cols="60" rows="1" name="title" placeholder="Insert title">{{ $post -> title }}</textarea><br>
        <label for="subtitle">Subtitle:</label><br>
        <textarea id="subtitle" cols="40" rows="2" name="subtitle" placeholder="Insert subtitle">{{ $post -> subtitle }}</textarea><br>
        <label for="text">Text:</label><br>
        <textarea id="text" cols="100" rows="8"name="text" placeholder="Insert text here">{{ $post -> text }}</textarea><br>
        <br>
        <label for="cat">Choose a category:</label><br>
        <select name="cat" id="cat">
            @foreach ($cats as $cat)
                <option value="{{ $cat -> id }}"
                    @if ($cat -> id == $post -> cat -> id)
                        selected
                    @endif
                >{{ $cat -> name }}</option>
            @endforeach
        </select><br><br><br>
        <span>Choose a reaction:</span><br>
            @foreach ($reactions as $reaction)
                <input type="checkbox" name="reactions[]" value="{{ $reaction -> id }}"
                @foreach ($post -> reactions as $postReaction)
                    @if ($reaction -> id == $postReaction -> id)
                    checked
                    @endif
                @endforeach
                
                > {{ $reaction -> name }}
            @endforeach
        <br><br>
        <input type="submit" value="Update">
    </form>

    <br><br><br>
    <a href="{{ route('posts') }}">Back to the Posts</a>

@endsection
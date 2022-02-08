@extends('layouts.main-layout')

@section('content')
    
<h1>Create new post</h1>
<br><br><br>

    <form action="{{ route('store') }}" method="POST">

        @method("POST")
        @csrf

        <label for="title">Title:</label><br>
        <textarea id="title" cols="60" rows="1" name="title" placeholder="Insert title"></textarea><br>
        <label for="subtitle">Subtitle:</label><br>
        <textarea id="subtitle" cols="40" rows="2" name="subtitle" placeholder="Insert subtitle"></textarea><br>
        <label for="text">Text:</label><br>
        <textarea id="text" cols="100" rows="8"name="text" placeholder="Insert text here"></textarea><br>
        <br>
        <label for="cat">Choose a category:</label><br>
        <select name="cat" id="cat">
            @foreach ($cats as $cat)
                <option value="{{ $cat -> id }}">{{ $cat -> name }}</option>
            @endforeach
        </select><br><br><br>
        <span>Choose a reaction:</span><br>
            @foreach ($reactions as $reaction)
                <input type="checkbox" name="reactions[]" value="{{ $reaction -> id }}"> {{ $reaction -> name }}
            @endforeach
        <br><br>
        <input type="submit" value="Create">
    </form>

    <br><br><br>
    <a href="{{ route('posts') }}">Back to the Posts</a>

@endsection
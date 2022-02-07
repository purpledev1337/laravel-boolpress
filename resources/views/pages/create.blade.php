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
        <input type="submit" value="Create">
    </form>

    <a href="{{ route('posts') }}">Back to the Posts</a>

@endsection
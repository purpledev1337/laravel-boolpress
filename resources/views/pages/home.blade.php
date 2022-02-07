@extends('layouts.main-layout')

@section('content')

    <a id="posts_link" href="{{ route('posts') }}">Check all {{ count($posts) }} posts here!</a>

@endsection

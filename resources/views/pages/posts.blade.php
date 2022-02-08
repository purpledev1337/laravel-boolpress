@extends('layouts.main-layout')

@section('content')

<div id="post_area">
    
    <ul>
        @foreach ($posts as $post)
        <div class=" post_box
        @if($post -> cat -> name == 'general') general
        @elseif($post -> cat -> name == 'sports') sports
        @elseif($post -> cat -> name == 'politics') politics
        @elseif($post -> cat -> name == 'tech') tech
        @elseif($post -> cat -> name == 'gaming') gaming
        @elseif($post -> cat -> name == 'economy') economy
        @endif">
        <h1 class="post_title">{{ $post -> title }}</h1>
        <h4 class="post_subtitle">{{ $post -> subtitle }}</h4>
        <span class="post_cat">{{ $post -> cat -> name }}</span>
                by <span class="post_author">{{ $post -> user -> name }}</span>
                <p class="post_text">{{ $post -> text }}</p>
                <h6 class="post_date">{{ $post -> created_at }}</h6>
            </div>
        @endforeach
    </ul>

    <div id="create_post">
        <a href="{{ route('create') }}">
            Create new post
        </a>
    </div>

</div>


@endsection

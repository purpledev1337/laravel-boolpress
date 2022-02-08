@extends('layouts.main-layout')

@section('content')

<div id="post_area">
    
    <ul>
        @foreach ($posts as $post)
        <div class="
        @if($post -> cat -> name == 'general') post_box general
        @elseif($post -> cat -> name == 'sports') post_box sports
        @elseif($post -> cat -> name == 'politics') post_box politics
        @elseif($post -> cat -> name == 'tech') post_box tech
        @elseif($post -> cat -> name == 'gaming') post_box gaming
        @elseif($post -> cat -> name == 'economy') post_box economy
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

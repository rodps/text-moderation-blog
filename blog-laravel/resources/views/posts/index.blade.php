@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1 class="text-3xl border-b border-gray-200 mb-3">
        Posts
    </h1>

    <ul>
        @if (count($posts) === 0)
            <li class="text-center text-gray-500 py-3">
                No posts yet
            </li>
        @endif
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-400 block py-2 text-xl">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection


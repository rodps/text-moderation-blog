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
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-400 block py-2 text-xl flex gap-3">
                    {{ $post->title }}
                    @if ($post->status == 'approved')
                        <svg fill="#14d217" height="24" viewBox="-3.5 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4.63 15.638a1.028 1.028 0 0 1-.79-.37L.36 11.09a1.03 1.03 0 1 1 1.58-1.316l2.535 3.043L9.958 3.32a1.029 1.029 0 0 1 1.783 1.03L5.52 15.122a1.03 1.03 0 0 1-.803.511.89.89 0 0 1-.088.004z"></path></g></svg>
                    @elseif ($post->status == 'pending')
                        <svg fill="#000000" height="24" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style> .cls-1 { fill: none; } </style> </defs> <circle cx="9" cy="16" r="2"></circle> <circle cx="23" cy="16" r="2"></circle> <circle cx="16" cy="16" r="2"></circle> <path d="M16,30A14,14,0,1,1,30,16,14.0158,14.0158,0,0,1,16,30ZM16,4A12,12,0,1,0,28,16,12.0137,12.0137,0,0,0,16,4Z" transform="translate(0 0)"></path> <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect> </g></svg>
                    @elseif ($post->status == 'rejected')
                        <svg viewBox="0 -0.5 8 8" width="16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>close_mini [#1522]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-385.000000, -206.000000)" fill="#fd2626"> <g id="icons" transform="translate(56.000000, 160.000000)"> <polygon id="close_mini-[#1522]" points="334.6 49.5 337 51.6 335.4 53 333 50.9 330.6 53 329 51.6 331.4 49.5 329 47.4 330.6 46 333 48.1 335.4 46 337 47.4"> </polygon> </g> </g> </g> </g></svg>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
@endsection


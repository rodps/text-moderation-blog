@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1 class="text-3xl border-b border-gray-200 mb-6">
        {{ $post->title }}
    </h1>

    <p class="mb-12">
        {{ $post->text }}
    </p>

    <div class="flex gap-3 mb-6">
        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded text-sm">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
    
            <button type="submit" class="bg-red-500 hover:bg-red-400 text-white py-2 px-4 rounded text-sm">Delete</button>
        </form>
    </div>

    <a href="{{ route('posts.index') }}" class="text-gray-500 hover:underline">Back to posts</a>
@endsection
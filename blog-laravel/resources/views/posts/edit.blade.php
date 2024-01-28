@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-3xl border-b border-gray-200 mb-6">
        Edit Post
    </h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block mb-2 text-gray-700" for="title">
                Title
            </label>

            <input
                class="border border-gray-400 p-2 w-full rounded"
                type="text"
                name="title"
                id="title"
                value="{{ old('title') ?? $post->title }}"
            >

            @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 text-gray-700" for="text">
                Text
            </label>

            <textarea
                class="border border-gray-400 p-2 w-full rounded"
                name="text"
                id="text"
                cols="30"
                rows="10"
            >{{ old('text') ?? $post->text }}</textarea>

            @error('text')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-400"
            >
                Update
            </button>
        </div>
    </form>
    
    <a href="{{ route('posts.index') }}" class="text-gray-500 hover:underline">Back to posts</a>

@endsection
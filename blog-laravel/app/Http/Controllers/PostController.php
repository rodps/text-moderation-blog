<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Jobs\PostModeration;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'text' => $request->text,
            'slug' => str($request->title)->slug()
        ]);
        
        PostModeration::dispatch($post);

        $request->session()->flash('success', 'Post created!');

        return redirect('/posts');
    }

    public function show(string $id)
    {
        return view('posts.show', [
            'post' => Post::find($id)
        ]);
    }

    public function edit(string $id)
    {
        return view('posts.edit', [
            'post' => Post::find($id)
        ]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->text = $request->text;

        $post->save();

        $request->session()->flash('success', 'Post updated!');

        return redirect('/posts');
    }

    public function destroy(string $id)
    {
        Post::destroy($id);

        session()->flash('success', 'Post deleted!');
        
        return redirect('/posts');
    }
}

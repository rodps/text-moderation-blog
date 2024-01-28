<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

        Post::create([
            'title' => $request->title,
            'text' => $request->text,
            'slug' => str($request->title)->slug()
        ]);

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

        return redirect('/posts');
    }

    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect('/posts');
    }
}

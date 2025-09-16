<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
public function index()
{
    $posts = Post::with(['category', 'author'])
        ->where('status', 'published')
        ->latest()
        ->paginate(10);

    return view('posts.index', compact('posts'));
}

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

Post::create([
    'title'       => $request->title,
    'content'     => $request->content,
    'category_id' => $request->category_id,
    'user_id'     => Auth::id(),
    'status'      => $request->status ?? 'draft',
]);


    return redirect()->route('posts.index');
}


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    $post->update([
        'title'       => $request->title,
        'content'     => $request->content,
        'category_id' => $request->category_id, // konsisten
        'status'      => $request->status ?? 'draft',
    ]);

    return redirect()->route('posts.show', $post);
}

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}

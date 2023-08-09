<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image'
        ]);
        
        $validated = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image->store('posts')
        ];

        $request->user()->posts()->create($validated);
 
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {

        $this->authorize('update', $post);
 
        return view('posts.edit', [
            'posts' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image'
        ]);
        
        $post->update($validated);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post):RedirectResponse
    {
        $this->authorize('delete', $post);
 
        $post->delete();
 
        return redirect(route('posts.index')); 
    }
}

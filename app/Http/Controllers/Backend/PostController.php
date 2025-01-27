<?php

namespace App\Http\Controllers\Backend;


use App\Events\PostViewed;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::with('category', 'tags', 'comments')->paginate()->sortDesc();

        return view('backend.post.index', compact('posts'));
    }


    public function create(): View
    {
        return view('backend.post.create');
    }


    public function store(Request $request): RedirectResponse
    {
        // TODO: Create a StorePostRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return redirect()->route('posts.index')
            ->with([
                'flash'      => __('Post created successfully'),
                'flash.type' => 'success',
            ]);
    }


    public function show(Post $post): View
    {
        // An Event in order to register how many visits and views a post has.
        PostViewed::dispatch($post);

        return view('frontend.post.show', ['post' => $post]);
    }


    public function edit(Post $post): View
    {
        return view('backend.post.edit', ['post' => $post]);
    }


    public function update(Request $request, Post $post): RedirectResponse
    {
        // TODO: Create a UpdatePostRequest to validate the fields

        // TODO: Implement the update of the Post in the DB

        return redirect()->route('posts.index')
            ->with([
                'flash'      => __('Post updated successfully'),
                'flash.type' => 'success',
            ]);
    }


    public function destroy(Post $post): RedirectResponse
    {
        // TODO: Look how Jetstream handles the deletion of an user

        return redirect()->route('posts.index')
            ->with([
                'flash'      => __('Post deleted successfully'),
                'flash.type' => 'success',
            ]);
    }
}

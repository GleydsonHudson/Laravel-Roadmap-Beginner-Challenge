<?php

namespace App\Http\Controllers\Backend;


use App\Events\PostViewed;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::with('category', 'tags', 'comments')->paginate();

        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request): View|Factory|Application
    {
        // TODO: Create a StorePostRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return view('backend.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): Application|Factory|View
    {
        // An Event in order to register how many visits and views a post has.
        PostViewed::dispatch($post);

        return view('frontend.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('backend.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Application|Factory|View
     */
    public function update(Request $request, Post $post): View|Factory|Application
    {
        // TODO: Create a UpdatePostRequest to validate the fields

        // TODO: Implement the update of the Post in the DB

        return view('backend.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        // TODO: Look how Jetstream handles the deletion of an user
    }
}

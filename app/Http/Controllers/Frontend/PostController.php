<?php

namespace App\Http\Controllers\Frontend;


use App\Events\PostViewed;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::with('category', 'tags', 'comments')->publisehd()->paginate();

        return view('frontend.post.index', ['posts' => $posts]);
    }


    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        // An Event in order to register how many visits and views a post has.
        PostViewed::dispatch($post);

        return view('frontend.post.show', ['post' => $post]);
    }

}

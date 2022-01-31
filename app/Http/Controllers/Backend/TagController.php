<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Tags\Tag;
use function Symfony\Component\Translation\t;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tags = Tag::all();

        return view('backend.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request): View|Factory|Application
    {
        // TODO: Create a StoreTagRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return view('backend.tag.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag): View|Factory|Application
    {
        return view('backend.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Tag $tag
     * @return Application|Factory|View
     */
    public function update(Request $request, Tag $tag): View|Factory|Application
    {
        // TODO: Create a UpdateTagRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return view('backend.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return Response
     */
    public function destroy(Tag $tag)
    {
        // TODO: Look how Jetstream handles the deletion of an user
    }
}

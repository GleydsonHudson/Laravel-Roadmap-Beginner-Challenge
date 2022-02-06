<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Tags\Tag;
use function Symfony\Component\Translation\t;

class TagController extends Controller
{

    public function index(): View
    {
        $tags = Tag::paginate(10);

        return view('backend.tag.index', compact('tags'));
    }


    public function create(): View
    {
        return view('backend.tag.create');
    }


    public function store(Request $request): RedirectResponse
    {
        // TODO: Create a StoreTagRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return redirect()->route('backend.tag.index')->with('success', __('Tag created successfully'));
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

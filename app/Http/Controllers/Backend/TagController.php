<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{

    public function index(): View
    {
        $tags = Tag::paginate(10)->sortDesc();

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

        return redirect()->route('tags.index')
            ->with([
                'flash'      => __('Tag created successfully'),
                'flash.type' => 'success',
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag): View|Factory|Application
    {
        return view('backend.tag.edit', ['tag' => $tag]);
    }


    public function update(Request $request, Tag $tag): RedirectResponse
    {
        // TODO: Create a UpdateTagRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return redirect()->route('tags.index')
            ->with([
                'flash'      => __('Tag updated successfully'),
                'flash.type' => 'success',
            ]);
    }


    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('tags.index')
            ->with([
                'flash.message' => 'Tag deleted successfully',
                'flash.type'    => 'success',
            ]);
    }
}

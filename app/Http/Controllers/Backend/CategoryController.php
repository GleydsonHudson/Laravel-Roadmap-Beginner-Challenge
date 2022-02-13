<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::paginate()->sortDesc();

        return view('backend.category.index', compact('categories'));
    }


    public function create(): View|Factory|Application
    {
        return view('backend.category.create');
    }


    public function store(Request $request): RedirectResponse
    {
        // TODO: Create a StoreCategoryRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return redirect()->route('categories.index')
            ->with([
                'flash'      => __('Post updated successfully'),
                'flash.type' => 'success',
            ]);
    }


    public function edit(Category $category): View
    {
        return view('backend.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category): RedirectResponse
    {
        // TODO: Create a UpdateCategoryRequest to validate the fields

        // TODO: Implement the persistence of the Post in the DB

        return redirect()->route('categories.index')
            ->with([
                'flash.message' => 'Category updated successfully',
                'flash.type'    => 'success',
            ]);
    }


    public function destroy(Category $category): RedirectResponse
    {
        if ($category->posts()->count()) {
            return redirect()->route('categories.index')
                ->with([
                    'flash.message' => 'Cannot delete, category has posts!',
                    'flash.type'    => 'danger',
                ]);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with([
                'flash.message' => 'Category deleted successfully',
                'flash.type'    => 'success',
            ]);
    }
}

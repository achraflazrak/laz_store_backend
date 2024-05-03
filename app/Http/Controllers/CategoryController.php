<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('admin.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        if ($request->validated()) {
            Category::create([
                'name_en' => $request->name_en,
                'name_fr' => $request->name_fr,
                'slug' => Str::slug($request->name_en),
            ]);

            return redirect()->route('admin.categories.index')->with([
                'success' => 'Category added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit')->with([
            'category'=> $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        if ($request->validated()) {
            $category->update([
                'name_en' => $request->name_en,
                'name_fr' => $request->name_fr,
                'slug' => Str::slug($request->name_en),
            ]);

            return redirect()->route('admin.categories.index')->with([
                'success' => 'Category updated successfully'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories.index')->with([
            'success'=> 'Category deleted successfully'
        ]);

    }
}

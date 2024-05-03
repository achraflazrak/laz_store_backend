<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategories.index')->with([
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.subcategories.create')->with([
            'categories'=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        //
        Subcategory::create([
            'name_en'=> $request->name_en,
            'name_fr'=> $request->name_fr,
            'slug'=> Str::slug($request->name_en),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.subcategories.index')->with([
            'success' => 'Subcategory added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
        $categories = Category::all();
        return view('admin.subcategories.edit')->with([
            'subcategory' => $subcategory,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        //
        $subcategory->update([
            'name_en'=> $request->name_en,
            'name_fr'=> $request->name_fr,
            'slug'=> Str::slug($request->name_en),
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.subcategories.index')->with([
            'success' => 'Subcategory updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with([
            'success'=> 'Subcategory deleted successfully'
        ]);

    }
}

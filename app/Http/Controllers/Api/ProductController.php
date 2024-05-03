<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get all products
     */
    public function index()
    {
        $products = Product::with(['category', 'reviews'])
        ->latest()->paginate(6);
        $categories = Category::has('products')
            ->with(['products', 'subcategories'])->orderBy('name_en')->get();

        return response()->json([
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Filter products by category
     */
    public function getProductByCategory(Category $category)
    {
        $products = $category->products()->with('category')->paginate(5);

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Filter products by subcategory
     */
    public function getProductBySubcategory(Subcategory $subcategory)
    {
        $products = $subcategory->products()->with('category')->paginate(5);

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Filter products by title
     */
    public function searchQuery(Request $request)
    {
        $query = $request->searchTerm;

        $products = Product::with(['category', 'reviews'])
            ->where('name_en', 'like', '%'.$query.'%')
            ->orWhere('name_fr', 'like', '%'.$query.'%')
            ->latest()->paginate(5);

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Find products
     */

    public function show(Product $product)
    {
        return response()->json([
            'product' => $product->load(['category', 'reviews'])
        ]);
    }

    /**
     * Filter products by params
     */

     public function getProductsByFilters(Request $request)
     {
        $products = Product::with('category')->where($request->params[0], 1);

        if(isset($request->params[1])) {
            $products = Product::with('category')->orWhere($request->params[1], 1);
        }

        if(isset($request->params[2])) {
            $products = Product::with('category')->orWhere($request->params[2], 1);
        }

        if(isset($request->params[3])) {
            $products = Product::with('category')->orWhere($request->params[3], 1);
        }

        return response()->json([
            'products' => $products->latest()->paginate(1)
        ]);

     }

}

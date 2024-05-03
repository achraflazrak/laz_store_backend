<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $path;


    public function __construct()
    {
        $this->path = public_path('storage/images/products/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with(['category', 'subcategory'])
                    ->latest()->get();

        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.products.create')->with([
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $data = $request->all();
        $product_thumbnail = $request->file('product_thumbnail');
        $product_thumbnail_name = time() . '_' . 'product_thumbnail'. '_' .$product_thumbnail->getClientOriginalName();
        $product_thumbnail->storeAs('images/products/', $product_thumbnail_name, 'public');
        $data['product_thumbnail'] = $product_thumbnail_name;

        //if we get the product image 1 we store it in the products images folder
        if($request->has('product_image_1')) {
            $product_image_one = $request->file('product_image_1');
            $product_image_one_name = time() . '_' . 'product_image_one'. '_' .$product_image_one->getClientOriginalName();
            $product_image_one->storeAs('images/products/', $product_image_one_name, 'public');
            $data['product_image_1'] = $product_image_one_name;
        }

        //if we get the product image 2 we store it in the products images folder
        if($request->has('product_image_2')) {
            $product_image_two = $request->file('product_image_2');
            $product_image_two_name = time() . '_' . 'product_image_two'. '_' .$product_image_two->getClientOriginalName();
            $product_image_two->storeAs('images/products/', $product_image_two_name, 'public');
            $data['product_image_2'] = $product_image_two_name;
        }

        //if we get the product image 2 we store it in the products images folder
        if($request->has('product_image_3')) {
            $product_image_three = $request->file('product_image_3');
            $product_image_three_name = time() . '_' . 'product_image_three'. '_' .$product_image_three->getClientOriginalName();
            $product_image_three->storeAs('images/products/', $product_image_three_name, 'public');
            $data['product_image_3'] = $product_image_three_name;
        }

        $data['slug'] = Str::slug($request->name_en);
        Product::create($data);
        return redirect()->route('admin.products.index')->with([
            'success' => 'Product added successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.products.edit')->with([
            'categories' => $categories,
            'subcategories' => $subcategories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $data = $request->all();

        //if we get the product thumbnail we store it in the products images folder
        if ($request->has('product_thumbnail')) {
            if (File::exists($this->path . $product->product_thumbnail)) {
                File::delete($this->path . $product->product_thumbnail);
            }
            $product_thumbnail = $request->file('product_thumbnail');
            $product_thumbnail_name = time() . '_' . 'product_thumbnail' . '_' . $product_thumbnail->getClientOriginalName();
            $product_thumbnail->storeAs('images/products/', $product_thumbnail_name, 'public');
            $data['product_thumbnail'] = $product_thumbnail_name;
        }

        //if we get the product image 1 we store it in the products images folder
        if($request->has('product_image_1')) {
            if (File::exists($this->path . $product->product_image_1)) {
                File::delete($this->path . $product->product_image_1);
            }
            $product_image_one = $request->file('product_image_1');
            $product_image_one_name = time() . '_' . 'product_image_one'. '_' .$product_image_one->getClientOriginalName();
            $product_image_one->storeAs('images/products/', $product_image_one_name, 'public');
            $data['product_image_1'] = $product_image_one_name;
        }

        //if we get the product image 2 we store it in the products images folder
        if($request->has('product_image_2')) {
            if (File::exists($this->path . $product->product_image_2)) {
                File::delete($this->path . $product->product_image_2);
            }
            $product_image_two = $request->file('product_image_2');
            $product_image_two_name = time() . '_' . 'product_image_two'. '_' .$product_image_two->getClientOriginalName();
            $product_image_two->storeAs('images/products/', $product_image_two_name, 'public');
            $data['product_image_2'] = $product_image_two_name;
        }

        //if we get the product image 2 we store it in the products images folder
        if($request->has('product_image_3')) {
            if (File::exists($this->path . $product->product_image_3)) {
                File::delete($this->path . $product->product_image_3);
            }
            $product_image_three = $request->file('product_image_3');
            $product_image_three_name = time() . '_' . 'product_image_three'. '_' .$product_image_three->getClientOriginalName();
            $product_image_three->storeAs('images/products/', $product_image_three_name, 'public');
            $data['product_image_3'] = $product_image_three_name;
        }

        $data['slug'] = Str::slug($request->name_en);
        $data['new'] = $request->new ?? 0;
        $data['best_seller'] = $request->best_seller ?? 0;
        $data['featured'] = $request->featured ?? 0;
        $data['hot_deal'] = $request->hot_deal ?? 0;
        $product->update($data);
        return redirect()->route('admin.products.index')->with([
            'success' => 'Product updated successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        if (File::exists($this->path . $product->product_thumbnail)) {
            File::delete($this->path . $product->product_thumbnail);
        }

        if (File::exists($this->path . $product->product_image_1)) {
            File::delete($this->path . $product->product_image_1);
        }

        if (File::exists($this->path . $product->product_image_2)) {
            File::delete($this->path . $product->product_image_2);
        }

        if (File::exists($this->path . $product->product_image_3)) {
            File::delete($this->path . $product->product_image_3);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with([
            'success' => 'Product deleted successfully'
        ]);

    }
}

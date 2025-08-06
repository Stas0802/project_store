<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', ['products' => $products,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
       return view('product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('/public/product', $imageName);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'categories_id' => $request->categories_id
        ]);
        return redirect()->route('product.index')->with(['success' => 'Product add']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('image')){
            $newImage = $request->file('image');
            $imageName = uniqid() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('/public/product' , $imageName);

            $oldImage = public_path('storage/product/' . $product->image);
            if(file_exists($oldImage)){
                unlink($oldImage);
            }

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categories_id = $request->categories_id;
        $product->save();
        return redirect()->route('product.index')->with(['success' => 'product update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $image = public_path('storage/product/' . $product->image);
        if(file_exists($image)){
            unlink($image);
        }
        $product->delete();
        return redirect()->route('product.index')->with(['success' => 'product delete']);
    }
}

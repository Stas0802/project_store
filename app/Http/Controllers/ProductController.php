<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileUploadService;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
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
    public function store(StoreProductRequest $request, FileUploadService $fileService)
    {
        $imageName = $fileService->uploadFile($request->file('image'), 'product');
        Product::create([
            'name' => $request->product_name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        return redirect()->back()->with(['success' => 'Product add']);
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
    public function update(StoreProductRequest $request, Product $product, FileUploadService $fileService)
    {
        if($request->hasFile('image')){
            $fileService->deleteFile('product', $product->image);
            $product->image = $fileService->uploadFile($request->file('image'), 'product');
        }

        $product->name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.index')->with(['success' => 'product update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, FileUploadService $fileService)
    {
        $fileService->deleteFile('product', $product->image);
        $product->delete();
        return redirect()->route('product.index')->with(['success' => 'product delete']);
    }
}

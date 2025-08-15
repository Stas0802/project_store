<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('category.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, FileUploadService $fileService)
    {
        $imageName = $fileService->uploadFile($request->file('image'), 'category');
        Category::create([
            'name' => $request->category_name,
            'image'=> $imageName,
            ]);
        return redirect()->back()->with(['success' => 'Category add']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category, FileUploadService $fiileService)
    {
        if($request->hasFile('image')){
            $fiileService->deleteFile('category', $category->image);
            $category->image = $fiileService->uploadFile($request->file('image'), 'category');
        }
        $category->name = $request->category_name;
        $category->save();
        return redirect()->route('category.index')->with(['success' => 'category update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, FileUploadService $fileService)
    {
        $fileService->deleteFile('category', $category->image);
        if($category->products()->exists()){
            return back()->with(['error' => 'В этой категории есть товары поэтому ее нельзя удалить!']);
        }
        $category->delete();
        return redirect()->route('category.index')->with(['success' => 'category delete']);
    }
}

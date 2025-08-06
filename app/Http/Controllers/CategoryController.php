<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
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
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('/public/category' , $imageName);
        Category::create([
            'name' => $request->name,
            'image'=> $imageName,
            ]);
        return redirect()->route('category.index')->with(['success' => 'Category add']);
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
    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image')){
            $newImage = $request->file('image');
            $imageName = uniqid() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('public/category' , $imageName);

            $oldName = public_path('storage/category/' . $category->image);
            if(file_exists($oldName)){
                unlink($oldName);
            }

            $category->image = $request->image;
        }
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with(['success' => 'category update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $image = public_path('storage/category/' . $category->image);
        if(file_exists($image)){
            unlink($image);
        }
        $category->delete();
        return redirect()->route('category.index')->with(['success' => 'category delete']);
    }
}

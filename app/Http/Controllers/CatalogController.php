<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('catalog.index', ['categories' => $categories]);
    }

    public function show(Category $category){

        $products = Product::where('categories_id', $category->id)->get();
        return view('catalog.show', ['category' => $category, 'products' => $products]);
    }
}

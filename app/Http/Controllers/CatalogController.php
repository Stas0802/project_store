<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    /**
     * Show categories Home page and paginate 12 things
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        $categories = Category::paginate(6);
        return view('catalog.index', ['categories' => $categories]);
    }

    /**
     * Show products in category on page and 12 things
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Category $category){

        $products = Product::where('category_id', $category->id)
            ->paginate(6);
        return view('catalog.show', ['category' => $category, 'products' => $products]);
    }
}

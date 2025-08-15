<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;



class DashboardController extends Controller
{

    /**
     * Show category in table dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|\Illuminate\Foundation\Application
     */
    public function index(){
        $categories = Category::all();
        return view('dashboard', ['categories' => $categories]);
    }

}

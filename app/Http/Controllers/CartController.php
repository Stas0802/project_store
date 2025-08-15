<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{

    /**
     * Show all product in cart
     * @param CartService $cartService
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(CartService $cartService): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $cartData =  $cartService->cartData();
        return view('cart.index', ['cartData' => $cartData]);
    }


    /**
     * Save product session in cart
     * @param CartService $cartService
     * @param Product $product
     * @return RedirectResponse
     */
    public function addToCart(CartService $cartService, Product $product): RedirectResponse
    {
        $cartService->add($product);
        return redirect()->back()->with(['success' => 'product add to cart']);
    }

    /**
     * delete product from cart
     * @param CartService $cartService
     * @param $id
     * @return RedirectResponse
     */
    public function removeCart(CartService $cartService, $id): RedirectResponse
    {
        $product = Product::find($id);
        $cartService->remove($product);
        return redirect()->back()->with(['success' => 'product delete from cart']);
    }
}

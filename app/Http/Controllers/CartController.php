<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Show all product in cart
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        $cart = session('cart', []);
        return view('cart.index', ['cart' => $cart]);
    }


    /**
     * Save product session in cart
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function addToCart(Request $request, Product $product){

        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        }else{
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with(['success' => 'product add to cart']);
    }

    /**
     * delete product from cart
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function removeCart($id){

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with(['success' => 'product delete from cart']);
    }
}

<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    /**
     * Get all items from the cart.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function getProducts(): mixed
    {
        return session('cart', []);
    }

    /**
     * Calculate  total  of product in  cart.
     * @return float|int
     */
    public function count(): float|int
    {
        return array_sum(array_column($this->getProducts(), 'quantity'));
    }

    /**
     * Get data cart
     * @return array
     */
    public function cartData(): array
    {
        $cart = $this->getProducts();
        $total = 0;
        foreach ($cart as $id => $product){
            $productTotal = $product['quantity'] * $product['price'];
            $total += $productTotal;
            $cart[$id]['productTotal'] = $productTotal;
        }
        return ['products' => $cart, 'total' => $total];
    }

    /**
     * Add product in cart
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void
    {
        $cart = $this->getProducts();

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
    }

    /**
     * Delete product from cart
     * @param Product $product
     * @return void
     */
    public function remove(Product $product): void
    {
        $cart = $this->getProducts();
        if(isset($cart[$product->id])){
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }
    }

}

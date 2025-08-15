<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderProductController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Show product for edite in admin panel
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Order $order)
    {
        $products = Product::with('category')->get();
        return view('order.edit', ['products' => $products, 'order' => $order]);
    }

    /**
     * Update product in order
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProductInOrder(Request $request, Order $order)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $this->orderService->updateProductInOrder($order, $productId, $quantity);

        return redirect()->route('order.show', $order->id)->with(['success' => 'Order change success']);
    }

    /**
     * Delete product from order
     * @param Order $order
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProductFromOrder(Order $order, Product $product)
    {
        $order->products()->detach($product->id);
        return redirect()->route('order.show', $order->id)->with(['success' => 'Product from order delete']);
    }


}

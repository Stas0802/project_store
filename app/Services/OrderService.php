<?php

namespace App\Services;

use App\DTO\OrderProductData;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Create order with product bindings.
     * @param array $customerData
     * @param array $rawProducts
     * @return Order
     */
    public function createOrder(array $customerData, array $rawProducts): Order
    {
        return DB::transaction(function () use ($customerData, $rawProducts) {
            $customerData['order_number'] = '#' . strtoupper(uniqid());
            $order = Order::create($customerData);

            foreach ($rawProducts as $productId => $itemData) {
                $dto = OrderProductData::fromArray($productId, $itemData);
                $product = Product::find($dto->productId);
                if(!$dto || !$product){
                    continue;
                }

                $order->products()->attach(
                    $product->id,
                    $this->pivotData($product, $dto->quantity)
                );
            }
            return $order;
        });
    }

    /**
     * Update product in order, change quantity or add new product
     * @param Order $order
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public function updateProductInOrder(Order $order, int $productId, int $quantity): bool
    {
        $product = Product::find($productId);
        if(!$product || $quantity < 1){
            return false;
        }

        $pivotData = $this->pivotData($product, $quantity);

        $existing = $order->products()->where('product_id', $productId)->first();

        if ($existing) {
            $order->products()->updateExistingPivot($productId, $pivotData);
        } else {
            $order->products()->attach($productId, $pivotData);
        }
        return  true;
    }

    /**
     * Form data for pivot table
     * @param Product $product
     * @param int $quantity
     * @return array
     */
    private function pivotData(Product $product, int $quantity): array
    {
        $price = $product->price;
        $total = $price * $quantity;
        return [
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total,
        ];
    }

    /**
     * Calculates the total order amount for related products.
     * @param Order $order
     * @return mixed
     */
    public function calcTotal(Order $order): mixed
    {
        return $order->products->sum(function ($product){
           return $product->pivot->total;
        });
    }

}

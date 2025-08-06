<?php

namespace App\Services;

use App\DTO\OrderProductData;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(array $customerData, array $rawProducts): Order
    {
        return DB::transaction(function () use ($customerData, $rawProducts) {
            $order = Order::create($customerData);

            foreach ($rawProducts as $productId => $itemData) {
                $dto = OrderProductData::fromArray($productId, $itemData);
                if (!$dto) continue;

                $product = Product::find($dto->productId);
                if (!$product) continue;


                $price = $product->price;
                $total = $price * $dto->quantity;


                $order->products()->attach($product->id, [
                    'quantity' => $dto->quantity,
                    'price'    => $price,
                    'total'    => $total,
                ]);
            }
            return $order;
        });
    }

}

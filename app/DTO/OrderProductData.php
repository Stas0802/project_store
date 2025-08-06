<?php

namespace App\DTO;

class OrderProductData
{
    public int $productId;

    public int $quantity;

    public function __construct(int $productId, int $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    /**
     * @param int $productId
     * @param array $data
     * @return self|null
     */
    public static function fromArray(int $productId, array $data): ?self
    {
        if(empty($data['quantity'])){
            return null;
        }

        return new self($productId, (int) $data['quantity']);
    }

}

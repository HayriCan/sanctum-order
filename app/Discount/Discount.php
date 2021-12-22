<?php

namespace App\Discount;

use App\Discount\Handlers\DiscountHandler;

abstract class Discount
{
    protected $orderId;

    protected $total;

    protected $discountedTotal;

    protected $totalDiscount;

    protected $discounts;

    abstract public function apply();

    public function response(): array
    {
        return [
            'orderId' => $this->orderId,
            'discounts' => $this->discounts,
            'totalDiscount' => DiscountHandler::numberFormat($this->totalDiscount),
            'discountedTotal' => $this->discountedTotal,
        ];
    }

    public function addDiscount($reason, $amount): array
    {
        $this->totalDiscount += (double) $amount;
        $this->discountedTotal = DiscountHandler::calculateSubtractedValue($amount, $this->discountedTotal);

        return [
            'discountReason' => $reason,
            'discountAmount' => $amount,
            'subtotal' => $this->discountedTotal,
        ];
    }
}

<?php

namespace App\Discount;

use App\Discount\Handlers\DiscountHandler;
use App\Handlers\ProductHandler;
use Illuminate\Support\Collection;

class DiscountCalculation extends Discount
{
    const BUY_FIVE_GET_ONE_FREE = 'BUY_5_GET_1';
    const BUY_2_GET_20_PERCENT = 'BUY_2_GET_20_PERCENT';
    const TEN_PERCENT_OVER_THOUSAND = '10_PERCENT_OVER_1000';

    private $productGroups;

    private $basket;

    public function __construct($order)
    {
        $this->orderId = $order['id'];
        $this->basket = $order['items'];
        $this->total = (double) $order['total'];
        $this->discountedTotal = (double) $order['total'];
        $this->productGroups = ProductHandler::getProductGroups();
    }

    public function apply(): array
    {
        $this->buyFiveGetOneFree($this->basket);
        $this->buyTwoGetTwentyPercent($this->basket);
        $this->tenPercentOverThousand();

        return $this->response();
    }

    public function buyFiveGetOneFree($basket)
    {
        $productCategoryId = 2;

        foreach ($basket as $order) {
            if (in_array($order['productId'], $this->productGroups[$productCategoryId])) {
                $times = DiscountHandler::calculteHowManyTimesNumberGoesInside($order['quantity'], 6);
                while ($times > 0) {
                    $this->discounts[] = $this->addDiscount(self::BUY_FIVE_GET_ONE_FREE, $order['unitPrice']);
                    $times--;
                }
            }
        }
    }

    public function buyTwoGetTwentyPercent($basket)
    {
        $productCategoryId = 1;

        $productCount = 0;
        $productPrices = new Collection();
        foreach ($basket as $order) {
            if (in_array($order['productId'], $this->productGroups[$productCategoryId])) {
                $productCount += $order['quantity'];
                $productPrices->push((double)$order['unitPrice']);
            }
        }

        if ($productCount >= 2) {
            $amount = DiscountHandler::calculatePercentOfAmount($productPrices->min(), 20);
            $this->discounts[] = $this->addDiscount(self::BUY_2_GET_20_PERCENT, $amount);
        }
    }

    public function tenPercentOverThousand()
    {
        if ($this->total >= 1000) {
            $amount = DiscountHandler::calculatePercentOfAmount($this->total, 10);
            $this->discounts[] = $this->addDiscount(self::TEN_PERCENT_OVER_THOUSAND, $amount);
        }
    }
}

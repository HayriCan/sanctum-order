<?php

namespace App\Discount\Controllers;

use App\Discount\Requests\DiscountRequest;
use App\Discount\DiscountCalculation;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DiscountController extends Controller
{
    /**
     * Apply Discount Rules To Order
     *
     * @param DiscountRequest $request
     * @return JsonResponse
     */
    public function getDiscount(DiscountRequest $request): JsonResponse
    {
        $discount = (new DiscountCalculation($request->only(['id', 'items', 'total'])))->apply();

        return $this->success($discount);
    }
}

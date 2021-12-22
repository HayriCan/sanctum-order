<?php

namespace App\Order\Controllers;

use App\Order\Handlers\OrderHandler;
use App\Order\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Get All Orders
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = OrderHandler::getAllOrders()->toArray();

        return $this->success($orders);
    }

    /**
     * Create Order
     *
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function create(OrderRequest $request): JsonResponse
    {
        $order = OrderHandler::create($request->all())->toArray();

        return $this->success($order, 201);
    }

    /**
     * Delete Order
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        OrderHandler::delete($id);

        return $this->success(['message' => __('Order removed successfully!')]);
    }
}

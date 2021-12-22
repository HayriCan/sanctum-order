<?php

namespace App\Order\Handlers;

use App\Order\Models\Order;
use Illuminate\Database\Eloquent\Builder;

class OrderHandler
{
    public static function query(): Builder
    {
        return Order::query();
    }

    public static function getOrderById($id)
    {
        return self::query()->findOrFail($id);
    }

    public static function getAllOrders()
    {
        return self::query()->get();
    }

    public static function create($params)
    {
        return self::query()->create($params);
    }

    public static function delete($id)
    {
        return self::getOrderById($id)->delete();
    }
}

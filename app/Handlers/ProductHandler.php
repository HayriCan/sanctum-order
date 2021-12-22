<?php

namespace App\Handlers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductHandler
{
    public static function query(): Builder
    {
        return Product::query();
    }

    public static function getProductById($productId)
    {
        return self::query()
            ->where('id', $productId)
            ->first();
    }

    public static function getProductCategories()
    {
        return self::query()
            ->groupBy('category')
            ->pluck('category')
            ->toArray();
    }

    public static function getProductIdsByCategory($categoryId): array
    {
        return self::query()
            ->where('category', $categoryId)
            ->pluck( 'id')
            ->toArray();
    }

    public static function getProductGroups(): array
    {
        $productCategories = self::getProductCategories();

        $productGroups = [];
        foreach ($productCategories as $category) {
            $productGroups[$category] = self::getProductIdsByCategory($category);
        }

        return $productGroups;
    }

    public static function getStock($productId)
    {
        return !is_null(self::getProductById($productId)) ? self::getProductById($productId)->stock : 0;
    }
}

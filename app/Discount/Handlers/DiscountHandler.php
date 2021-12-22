<?php

namespace App\Discount\Handlers;

class DiscountHandler
{
    public static function calculateSubtractedValue($discountAmount, $total): string
    {
        return self::numberFormat((string) ((double) $total - (double)$discountAmount));
    }

    public static function calculatePercentOfAmount($amount, $percentage): string
    {
        return floor((double) $amount * (int) $percentage)/100;
    }

    public static function calculteHowManyTimesNumberGoesInside($number, $divisor)
    {
        return ($number - ($number % $divisor)) / $divisor;
    }

    public static function numberFormat($number): string
    {
        return number_format(round($number , 2, PHP_ROUND_HALF_UP), 2,'.','');
    }
}

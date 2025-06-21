<?php

namespace App\Helpers;

class CustomHelper
{
    public static function formatIndianCurrency($amount)
    {
        $amount = (string)$amount;
        $decimal = '';

        // Handle decimal part if exists
        if (strpos($amount, '.') !== false) {
            list($amount, $decimal) = explode('.', $amount);
            $decimal = '.' . substr($decimal, 0, 2);
        }

        $last3 = substr($amount, -3);
        $restUnits = substr($amount, 0, -3);
        if ($restUnits != '') {
            $last3 = ',' . $last3;
        }
        $formatted = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits) . $last3;

        return $formatted . $decimal;
    }
}

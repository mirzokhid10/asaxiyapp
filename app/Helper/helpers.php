<?php

use App\Models\Advertisements;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;


function checkDiscount($products)
{
    $currentDate = date('Y-m-d');

    if ($products->price > 0 && $currentDate >= $products->offer_start_date && $currentDate <= $products->offer_end_date) {
        return true;
    }

    return false;
}

/** Calculate discount percent */

function calculateDiscountPercent($price, $discount_price)
{
    $discountAmount = $price - $discount_price;
    $discountPercent = ($discountAmount / $price) * 100;

    return round($discountPercent);
}

/** Check the product type */

function productType($product_type)
{
    switch ($product_type) {
        case 'super_price':
            return 'Super Price';
            break;
        case 'top':
            return 'Top';
            break;
        case 'discount':
            return 'Discount';
            break;

        case 'new':
            return 'New';
            break;

        default:
            return '';
            break;
    }

}

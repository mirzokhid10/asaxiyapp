<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function showProduct($slug)
    {
        $product = Products::with([
            'characteristicValues.characteristic',
            'characteristicValues.options',
            'characteristicValues.option',
            'productImageGalleries'
        ])->where('slug', $slug)->firstOrFail();

        return view('frontend.pages.product-detail', compact('product'));
    }
}

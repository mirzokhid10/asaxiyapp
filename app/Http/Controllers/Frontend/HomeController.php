<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisements;
use App\Models\Brands;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        $brands = Brands::where('status', 1)->get();

        $homepage_secion_banner_ads = Advertisements::where('status', 1)->get();
        return view('frontend.home.home', compact('flashSaleDate', 'flashSaleItems', 'homepage_secion_banner_ads', 'brands'));
    }
}

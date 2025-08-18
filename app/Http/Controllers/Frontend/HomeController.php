<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisements;
use App\Models\Brands;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homepage_secion_banner_ads = Advertisements::where('status', 1)->get();
        $brands = Brands::where('status', 1)->get();
        return view('frontend.home.home', compact('homepage_secion_banner_ads', 'brands'));
    }
}

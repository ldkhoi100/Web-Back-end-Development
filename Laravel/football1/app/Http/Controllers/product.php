<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class product extends Controller
{
    public function index(Request $request)
    {
        $productDescription = $request->productDescription;
        $price = $request->price;
        $discountPercent = $request->discountPercent;
        $discountAmount = $price * $discountPercent * 0.01;
        $discountPrice = $price - $discountAmount;

        return view('show_discount_amount', compact(['discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent']));
    }
}
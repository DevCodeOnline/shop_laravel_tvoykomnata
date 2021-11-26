<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug = null)
    {
        $product = Product::where('slug', $slug)->first();
        return view('shop.product', compact('product'));
    }
}

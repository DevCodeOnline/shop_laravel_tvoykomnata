<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            's' => 'required'
        ]);

        $s = $request->s;
        $products = Product::where('title', 'LIKE', "%$s%")->paginate(15);
        return view('shop.search', compact('products', 's'));
    }
}

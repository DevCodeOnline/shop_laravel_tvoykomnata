<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index($slug = null)
    {
        if ($slug == null) {
            $brands = Brand::all();
            $info = Page::find(7);
            return view('shop.brand', compact('brands', 'info'));
        } else {
            $brands = Brand::where('slug', $slug)->first();

            $title = $brands->title;
            $products = Product::where('brand', $brands->id)->get()->paginate(15);

            return view('shop.brand-item', compact('brands', 'title', 'products'));
        }

    }
}

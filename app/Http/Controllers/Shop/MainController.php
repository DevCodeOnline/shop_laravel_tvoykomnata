<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\PhoneMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all()->whereIn('popular', 1)->take(3);
        $products = Product::all()->whereIn('popular', 1)->take(8);
        $brands = Brand::all()->whereIn('popular', 1)->take(5);

        $info = Page::find(1);

        return view('shop.index', compact('categories', 'products', 'brands', 'info'));
    }

    public function callback(Request $request)
    {
        $data = $request->all();
        Mail::to(env('MAIL_USERNAME'))->send(new PhoneMail($data));
        return true;
    }
}

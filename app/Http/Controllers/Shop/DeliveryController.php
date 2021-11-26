<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $info = Page::find(4);
        return view('shop.delivery', compact('info'));
    }
}

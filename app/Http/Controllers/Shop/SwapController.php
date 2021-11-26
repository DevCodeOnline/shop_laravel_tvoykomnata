<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class SwapController extends Controller
{
    public function index()
    {
        $info = Page::find(10);
        return view('shop.swap', compact('info'));
    }
}

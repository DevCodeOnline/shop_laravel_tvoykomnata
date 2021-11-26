<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $info = Page::find(3);
        return view('shop.payment', compact('info'));
    }
}

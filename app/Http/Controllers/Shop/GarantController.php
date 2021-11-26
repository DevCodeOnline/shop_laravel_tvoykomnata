<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class GarantController extends Controller
{
    public function index()
    {
        $info = Page::find(5);
        return view('shop.garant', compact('info'));
    }
}

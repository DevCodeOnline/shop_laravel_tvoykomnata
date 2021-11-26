<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function import(Request $request)
    {
        if ($request->hasFile('products_import')) {
            Excel::import(new ProductsImport(), request()->file('products_import'));
        }

        $request->session()->flash('success', 'Товары добавлены');
        return redirect()->back();
    }
}

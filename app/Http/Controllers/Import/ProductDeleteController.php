<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\ProductsDeleteImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductDeleteController extends Controller
{
    public function import(Request $request)
    {
        if ($request->hasFile('products_delete_import')) {
            Excel::import(new ProductsDeleteImport(), request()->file('products_delete_import'));
        }

        $request->session()->flash('success', 'Товары удалены');
        return redirect()->back();
    }
}

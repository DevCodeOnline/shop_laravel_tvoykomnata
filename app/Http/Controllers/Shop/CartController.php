<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = session()->get('cart');
        $info = Page::find(8);
        return view('shop.cart', compact('products', 'info'));
    }

    public function addCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        $cart = $request->session()->get('cart');

        if (!$request->session()->has('cart')) {
            session(['cart' => [
                $product->id => ['id' => $product->id, 'title' => $product->title, 'slug' => $product->slug, 'img' => $product->getImage(), 'price' => $product->price, 'qnt' => $request->input('qnt')]
            ]]);
        } else {
            if (array_key_exists($product->id, $cart)) {
                foreach ($request->session()->get('cart') as $k => $v) {
                    if ($v['id'] == $product->id) {
                        $request->session()->put("cart.$k.qnt", $v['qnt'] + $request->input('qnt'));
                    }
                }
            } else {
                $request->session()->put("cart.$product->id", ['id' => $product->id, 'title' => $product->title, 'slug' => $product->slug, 'img' => $product->getImage(), 'price' => $product->price, 'qnt' => $request->input('qnt')]);
            }

        }

    }

    public function destroy($id)
    {
        session()->pull("cart.$id");
        if (empty(session()->get('cart'))) {
            session()->forget('cart');
        }

        return redirect()->back();

    }

    public function countCart()
    {
        return count(session()->get('cart'));
    }
}

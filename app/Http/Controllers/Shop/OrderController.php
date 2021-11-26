<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('shop.order');
    }

    public function order(Request $request)
    {
        foreach ($request->input('container') as $k => $v) {
            if (!empty($v)) {
                $request->session()->put("cart.$k.qnt", $v);
            }
        }

        return true;
    }

    public function success(Request $request)
    {
        $order = Order::create($request->all());

        $data = session()->get('cart');

        // Получаем id товаров
        foreach ($data as $k => $v) {
            $product = Product::where('id', $k)->get()->first();

            Order::find($order->id)->product()->attach([
                $k => ['quantity' => $v['qnt']],
            ]);

            $qnt = $product->quantity;

            $product->quantity = $qnt - $v['qnt'];
            $product->save();
        }

        Mail::to(env('MAIL_USERNAME'))->send(new OrderMail());

        $request->session()->forget('cart');

        return view('shop.success');
    }
}

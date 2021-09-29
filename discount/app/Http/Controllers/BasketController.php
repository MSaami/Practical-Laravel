<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceededException;
use App\Product;
use Illuminate\Http\Request;
use App\Support\Basket\Basket;
use App\Support\Payment\Transaction;

class BasketController extends Controller
{
    private $basket;
    private $transaction;

    public function __construct(Basket $basket, Transaction $transaction)
    {
        $this->middleware('auth')->only(['checkoutForm', 'checkout']);
        $this->basket = $basket;
        $this->transaction = $transaction;
    }


    public function add(Product $product)
    {
        try {

            $this->basket->add($product, 1);

            return back()->with('success', __('payment.added to basket'));
        } catch (QuantityExceededException $e) {
            return back()->with('error', __('payment.quantity exceeded'));
        }
    }


    public function index()
    {
        $items = $this->basket->all();
        return view('basket', compact('items'));
    }


    public function checkoutForm()
    {
        return view('checkout');
    }


    public function update(Request $request, Product $product)
    {
        $this->basket->update($product, $request->quantity);
        return back();
    }

    public function checkout(Request $request)
    {
        $this->validateForm($request);


        $order =  $this->transaction->checkout();


        return redirect()->route('home')->with('success', __('payment.your order has been registered', ['orderNum' => $order->id]));
    }



    private function validateForm($request)
    {
        $request->validate([
            'method' => ['required'],
            'gateway' => ['required_if:method,online']
        ]);
    }
}

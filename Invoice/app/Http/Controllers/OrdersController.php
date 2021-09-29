<?php

namespace App\Http\Controllers;

use App\Order;
use App\Support\Payment\Transaction;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var Transaction
     */
    private $transaction;


    public function __construct(Transaction $transaction)
    {
        $this->middleware('auth');
        $this->transaction = $transaction;
        
    }



    public function index()
    {
        $orders= auth()->user()->orders;

        return view('order.index' , compact('orders'));

    }


    public function pay(Order $order)
    {
        return $this->transaction->pay($order);
    }
}

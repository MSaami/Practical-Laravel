<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Order $order)
    {
        return $order->downloadInvoice();
    }
}

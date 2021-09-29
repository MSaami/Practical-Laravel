<?php

namespace App\Support\Payment\Gateways;

use App\Order;
use Illuminate\Http\Request;

class Pasargad implements GatewayInterface
{
    public function pay(Order $order , int $amount)
    {
        dd('Pasargad Pay');
    }


    public function verify(Request $request)
    {
        # code...
    }


    public function getName(): string
    {
        return 'pasargad';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Payment\Transaction;

class PaymentController extends Controller
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }



    public function verify(Request $request)
    {
        return  $this->transaction->verify()
            ? $this->sendSuccessResponse()
            : $this->sendErrorResponse();
    }

    private function sendErrorResponse()
    {
        return redirect()->route('home')->with('error', 'مشکلی در هنگام ثبت سفارش به وجود آمده است');
    }

    private function sendSuccessResponse()
    {
        return redirect()->route('home')->with('success', 'سفارش شما با موفقیت ایجاد شد');
    }
}

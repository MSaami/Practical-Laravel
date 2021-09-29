<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Order extends Model
{
    protected $fillable = ['user_id', 'code', 'amount'];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generateInvoice()
    {
        $pdf = \PDF::loadView('order.invoice', ['order' => $this]);

        return $pdf->save($this->invoicePath());
    }

    public function paid()
    {
        return $this->payment->status;
    }


    public function downloadInvoice()
    {

        return Storage::disk('public')->download('invoices/' . $this->id . '.pdf');

    }

    public function invoicePath()
    {
        return storage_path('app/public/invoices/') . $this->id . '.pdf';
    }





}

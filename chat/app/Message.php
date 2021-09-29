<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'body'
    ];


    protected $appends = [
        'selfOwned'
    ];

    public function getSelfOwnedAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

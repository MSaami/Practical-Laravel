<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{


    protected $fillable = ['text', 'ticket_id'];


    public function repliable()
    {
        return $this->morphTo();
    }

    public function getCreatedAtAttribute($value)
    {
        $time = new \Verta($value);
        return $time->formatDifference();
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    const XP = 2;

    protected $fillable = ['user_id', 'text'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $time = new \Verta($value);
        return $time->formatDifference();

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    const XP = 5;
    protected $fillable = ['title', 'text'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    public function getCreatedAtAttribute($value)
    {
        $time = new \Verta($value);
        return $time->formatDifference();

    }
}

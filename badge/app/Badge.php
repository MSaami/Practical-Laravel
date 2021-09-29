<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['title', 'description', 'required_number', 'type', 'icon_url'];


    public function scopeXp($query)
    {
        $query->where('type', 0);
    }

    public function scopeTopic($query)
    {
        $query->where('type', 1);
    }

    public function scopeReply($query)
    {
        $query->where('type', 2);
    }
}

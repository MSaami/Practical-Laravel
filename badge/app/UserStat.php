<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

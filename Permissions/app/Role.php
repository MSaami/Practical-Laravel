<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Permission\Traits\HasPermissions;

class Role extends Model
{
    use HasPermissions;

    protected $fillable = ['name', 'persian_name'];
}

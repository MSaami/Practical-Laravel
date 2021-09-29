<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'text', 'department', 'file_path', 'priority'
    ];

    protected $attributes = [
        'status' => 0
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityAttribute($value)
    {
        return ['پایین', 'متوسط', 'بالا'][$value];
    }
    public function getStatusNameAttribute()
    {
        return ['باز', 'پاسخ داده شده', 'بسته'][$this->status];
    }

    public function getCreatedAtAttribute($value)
    {
        $time = new \Verta($value);
        return $time->formatDifference();
    }

    public function hasFile()
    {
        return !is_null($this->file_path);
    }


    public function file()
    {
        return $this->hasFile()
            ? Storage::url($this->file_path)
            : null;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);

    }

    public function isCreated()
    {
        return $this->status === 0;
    }


    public function replied()
    {
        $this->status = 1;
        $this->save();
    }

    public function close()
    {
        $this->status = 2;
        $this->save();
    }

    public function isClosed()
    {
        return $this->status === 2;
    }

}

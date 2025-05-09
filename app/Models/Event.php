<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'club_id',
        'is_visible',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}

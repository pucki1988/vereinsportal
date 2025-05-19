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
        'location',
        'all_day',
        'address',
        'send_to_church',
        'send_to_community'
    ];

    protected $casts = [
        'start' => 'datetime', // ← Cast hinzufügen
        'end' => 'datetime', // ← Cast hinzufügen
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}

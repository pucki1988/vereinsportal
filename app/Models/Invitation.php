<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'club_id',
        'token',
        'expires_at', // ← Wichtig!
    ];
    protected $casts = [
        'expires_at' => 'datetime', // ← Cast hinzufügen
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function isUsed()
    {
        return !is_null($this->used_at);
    }
}

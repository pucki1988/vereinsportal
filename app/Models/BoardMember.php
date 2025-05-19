<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    protected $fillable = [
        'name',
        'email',
        'position',
        'is_legal_representative',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuids;

    protected $fillable = [
        'datetime',
        'total',
        'status',
    ];

    protected $casts = [
        'datetime' => 'datetime',
        'total' => 'integer',
    ];
}

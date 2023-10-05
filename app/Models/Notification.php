<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at',
    ];

    protected $casts = [];

    public function Notifiable(): MorphTo
    {
        return $this->morphTo();
    }
}

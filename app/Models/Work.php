<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    use HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'store_id',
        'day',
        'working',
        'from',
        'to',
    ];
    protected $casts = [];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}

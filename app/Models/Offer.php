<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $fillable = [
        'item_id',
        'start_date',
        'end_date',
        'type',
        'value',
    ];
    
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

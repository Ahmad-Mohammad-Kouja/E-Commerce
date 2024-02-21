<?php

namespace App\Domains\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'item_store_id',
        'start_date',
        'end_date',
        'type',
        'value',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function itemStore(): BelongsTo
    {
        return $this->belongsTo(ItemStore::class);
    }

    //  Helper Methods
    public function getForGrid()
    {
        return Discount::with('itemStore.item')->get();
    }
}

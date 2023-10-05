<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemOrder extends Model
{
    use HasFactory;

    protected $table = 'item_orders';

    protected $fillable = [
        'item_id',
        'order_id',
        'quantity',
        'price',
    ];

    protected $casts = [];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Domains\Products\Models;

use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemStore extends Model
{
    use HasFactory;

    protected $table = 'item_stores';

    protected $fillable = [
        'item_id',
        'store_id',
        'price',
    ];

    protected $casts = [];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function getPriceWithDiscountAttribute()
    {
        $activeDiscount = $this->discount()
            ->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if ($activeDiscount) {
            if ($activeDiscount->type == 'percentage') {
                return $this->price - ($this->price * ($activeDiscount->value / 100));
            } elseif ($activeDiscount->type == 'fixed') {
                return max($this->price - $activeDiscount->value, 0); // Ensure price doesn't go below 0
            }
        }

        return $this->price;  // if no discount return the origin price :)
    }
}

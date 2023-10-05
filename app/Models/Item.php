<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'weight',
        'quantity',
        'status',
    ];

    protected $casts = [];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function item_stores(): HasMany
    {
        return $this->hasMany(ItemStore::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function item_orders(): HasMany
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

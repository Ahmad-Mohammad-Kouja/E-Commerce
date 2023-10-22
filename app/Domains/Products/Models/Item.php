<?php

namespace App\Domains\Products\Models;

use App\Domains\Operations\Models\Cart;
use App\Domains\Operations\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class Item extends Model
{
    use HasFactory;

    const DEFAULT_STATUS = 'active';

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

    public function itemStores(): HasMany
    {
        return $this->hasMany(ItemStore::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

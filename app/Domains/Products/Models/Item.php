<?php

namespace App\Domains\Products\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Domains\Operations\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Domains\Operations\Models\OrderDetail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static create(array $array)
 */
class Item extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'items';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'weight',
        'quantity',
        'status',
    ];

    protected $casts = [
        'quantity' => 'float',
        'weight' => 'float',
    ];

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

    //  Helper Methods
    public function getForGrid()
    {
        return QueryBuilder::for(Item::class)
            ->with('category')
            ->allowedFilters(['name', AllowedFilter::exact('status')])
            ->get();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('sm')
            ->width(150)
            ->height(150);

        $this->addMediaConversion('md')
            ->width(300)
            ->height(300);

        $this->addMediaConversion('lg')
            ->width(500)
            ->height(500);
    }
}

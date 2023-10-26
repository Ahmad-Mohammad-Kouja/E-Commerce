<?php

namespace App\Domains\Stores\Models;

use App\Domains\Locations\Models\City;
use App\Domains\Operations\Models\Order;
use App\Domains\Products\Models\ItemStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @method static take(int $int)
 */
class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'name',
        'city_id',
        'is_main',
    ];

    protected $casts = [
        'is_main' => 'boolean',
    ];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }

    public function contactInfos(): HasMany
    {
        return $this->hasMany(ContactInfo::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function itemStores(): HasMany
    {
        return $this->hasMany(ItemStore::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function works(): HasMany
    {
        return $this->hasMany(Work::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    // Helper Methods
    public function removeMainStore()
    {
        return self::where('is_main', 1)->update(['is_main' => 0]);
    }

    public function getForGrid()
    {
        return QueryBuilder::for(Store::class)
            ->with('city')
            ->allowedFilters(['name', 'city.name', AllowedFilter::exact('main', 'is_main')])
            ->get();
    }
}

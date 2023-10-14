<?php

namespace App\Domains\Stores\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    ];

    protected $casts = [];

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
}

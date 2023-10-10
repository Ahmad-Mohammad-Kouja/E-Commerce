<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static take(int $int)
 */
class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'name',
        'region_id',
        'street',
        'building_number',
        'apartment_number',
        'additional_information',
    ];

    protected $casts = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}

<?php

namespace App\Domains\Operations\Models;

use App\Domains\Entities\Models\User;
use App\Domains\Locations\Models\Address;
use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const DEFAULT_STATUS = 'active';

    protected $fillable = [
        'user_id',
        'store_id',
        'address_id',
        'order_status',
        'payment_status',
        'delivery_type',
        'time_delivery',
        'current_location',
    ];

    protected $casts = [
        'time_delivery' => 'datetime',
    ];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}

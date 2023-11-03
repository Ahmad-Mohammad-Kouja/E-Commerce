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
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

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

    public function getForGrid()
    {
        return QueryBuilder::for(Order::class)
            ->select([
                'users.first_name',
                'users.last_name',
                'users.email',

                'stores.name as store_name',
                'items.name as item_name',
                'order_details.price AS price',
                'order_details.quantity AS quantity',
                DB::raw('(order_details.quantity * order_details.price) AS order_price') ,

                'order_status',
                'payment_status',
                'delivery_type',
                'time_delivery',
                'current_location',
            ])
            ->join('users', 'orders.user_id', 'users.id')
            ->join('stores', 'orders.store_id', 'stores.id')
            ->join('order_details' , 'order_details.order_id' , 'orders.id')
            ->join('items' , 'order_details.item_id' , 'items.id')
            ->allowedFilters([
                'users.first_name',
                'users.last_name',
                'stores.name' ,
                AllowedFilter::exact('order_status'),
                AllowedFilter::exact('payment_status'),
                AllowedFilter::exact('delivery_type'),
                'time_delivery'
            ])->getQuery();
    }

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

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}

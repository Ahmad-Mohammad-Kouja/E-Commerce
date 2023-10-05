<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'admin_id',
        'name',
        'city',
        'location',
        'delivery_fee',
    ];
    protected $casts = [];

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class);
    }


    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function contact_infos(): HasMany
    {
        return $this->hasMany(ContactInfo::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function item_stores(): HasMany
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
}

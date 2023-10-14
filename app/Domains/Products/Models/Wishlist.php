<?php

namespace App\Domains\Products\Models;

use App\Domains\Entities\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'user_id',
        'item_store_id',
    ];

    protected $casts = [];

    public function itemStore(): BelongsTo
    {
        return $this->belongsTo(ItemStore::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

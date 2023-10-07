<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_infos';

    protected $fillable = [
        'store_id',
        'platform',
        'contact',
    ];

    protected $casts = [];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}

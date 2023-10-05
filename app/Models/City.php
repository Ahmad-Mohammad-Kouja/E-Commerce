<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'name',
    ];

    protected $casts = [];

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }
}

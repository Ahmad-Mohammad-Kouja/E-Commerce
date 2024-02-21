<?php

namespace App\Domains\Stores\Models;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'store_id',
        'day',
        'working',
        'from',
        'to',
    ];

    protected $casts = [];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function getForGrid()
    {
        return QueryBuilder::for(Store::class)
            ->with('city')
            ->allowedFilters(['day', AllowedFilter::exact('working')])
            ->get();
    }
}

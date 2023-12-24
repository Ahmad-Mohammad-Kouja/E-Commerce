<?php

namespace App\Domains\Stores\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Ad extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'ads';

    protected $fillable = [
        'title',
        'store_id',
        'image',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function scopeStoreName($query, $value)
    {
        $query->whereHas('store', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }

    public function scopeAdCurrent($query, $value)
    {
        \Log::info("Called scopeStoreName with value: {$value}");
        $query->where([['end_date', '>=', $value], ['start_date', '<=', $value]]);
    }

    public function getForGrid()
    {
        return QueryBuilder::for(Ad::class)
            ->with('store', 'media')
            ->allowedFilters(['title',
                AllowedFilter::exact('start_date'),
                AllowedFilter::exact('end_date'),
                AllowedFilter::scope('StoreName'),
                AllowedFilter::scope('AdCurrent'),
            ])
            ->get();
    }
}

<?php

namespace App\Domains\Products\Models;

use App\Domains\Stores\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Offer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'offers';

    protected $fillable = [
        'store_id',
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'price',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    //  Helper Methods
    public function getForGrid()
    {
        return QueryBuilder::for(Offer::class)
            ->with('media')
            ->allowedFilters(['title', AllowedFilter::exact('price'), AllowedFilter::exact('status')])
            ->get();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('sm')
            ->width(150)
            ->height(150);

        $this->addMediaConversion('md')
            ->width(300)
            ->height(300);

        $this->addMediaConversion('lg')
            ->width(500)
            ->height(500);
    }
}

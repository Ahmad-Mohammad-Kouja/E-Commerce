<?php

namespace App\Domains\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @method static count()
 */
class Category extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'status',
        'image',
    ];

    protected $casts = [];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    //  Helper Methods
    public function getForGrid()
    {
        return QueryBuilder::for(Category::class)
            ->with('parent', 'media')
            ->allowedFilters(['name', AllowedFilter::exact('status')])
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

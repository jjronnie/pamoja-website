<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Property extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'size',
        'ownership',
        'description',
        'is_published',
        'created_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->onUpdate(true); // Regenerate slug if name changes
    }

    /**
     * Define the media collections.
     */
    public function registerMediaCollections(): void
    {
        // This collection will only ever hold one file.
        $this->addMediaCollection('featured_image')
            ->singleFile();

        // This collection can hold up to 5 files.
        $this->addMediaCollection('photos')
            ->collectionSize(5); // Enforces the max 5 file limit
    }

    /**
     * Define media conversions for optimizing images.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp') // Convert to WebP
            ->quality(80)    // Compress to 80% quality
            ->performOnCollections('featured_image', 'photos'); // Apply to both collections

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->format('webp')
            ->quality(70)
            ->performOnCollections('featured_image', 'photos');
    }

    /**
     * Get the user who created the property.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The categories that belong to the property.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_property');
    }
}
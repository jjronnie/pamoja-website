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

      // this will auto load realation with eager load
     protected $with = ['media'];

 protected $fillable = [
    'name',
    'slug',
    'size',
    'ownership',
    'description',
    'short_description',
    'directions',
    'features',
    'status',
    'location',
    'latitude',
    'longitude',
    'is_published',
    'is_featured',
    'created_by',
];


    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Define the media collections.
     */
    public function registerMediaCollections(): void
    {

        


        // Featured image collection - single image
        $this->addMediaCollection('featured')
            ->singleFile() // Only one featured image allowed
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(300)
                    ->height(300)
                    ->sharpen(10)
                    ->format('webp')
                    ->quality(80)
                     ->nonQueued();

                $this->addMediaConversion('preview')
                    ->width(800)
                    ->height(600)
                    ->sharpen(10)
                    ->format('webp')
                    ->quality(80)
                     ->nonQueued();
            });

        // Gallery collection - multiple images
        $this->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(200)
                    ->height(200)
                    ->sharpen(10)
                    ->format('webp')
                    ->quality(80)
                     ->nonQueued();

                $this->addMediaConversion('large')
                    ->width(1200)
                    ->height(900)
                    ->sharpen(10)
                    ->format('webp')
                    ->quality(80)
                     ->nonQueued();
            });
    }
    /**
     * Helper method to check if property has featured image
     */
    public function hasFeaturedImage(): bool
    {
        return $this->hasMedia('featured');
    }

    /**
     * Helper method to get featured image URL
     */
    public function getFeaturedImageUrl(string $conversion = ''): ?string
    {
        $media = $this->getFirstMedia('featured');

        if (!$media) {
            return null;
        }

        return $conversion ? $media->getUrl($conversion) : $media->getUrl();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($property) {
            $property->clearMediaCollection('featured');
            $property->clearMediaCollection('gallery');
        });
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
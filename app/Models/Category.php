<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'description'];

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
     * The properties that belong to the category.
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class);
    }

    
}
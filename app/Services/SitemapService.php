<?php

namespace App\Services;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Property;
use App\Models\Category;
use Carbon\Carbon;

class SitemapService
{
    public static function update()
    {
        $sitemap = Sitemap::create();

        // Static pages with route()
        $sitemap->add(
            Url::create(route('home'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0)
        );

        $sitemap->add(
            Url::create(route('about'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create(route('services'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.8)
        );

        $sitemap->add(
            Url::create(route('contact'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7)
        );

        $sitemap->add(
            Url::create(route('properties'))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)
        );





Property::where('is_published', true)->each(function (Property $property) use ($sitemap) {

    $url = Url::create(route('properties.show', $property->slug))
        ->setLastModificationDate($property->updated_at)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
        ->setPriority(0.8);

    $image = $property->getFeaturedImageUrl('preview');

    if (!empty($image)) {
        $url->addImage($image, $property->name);
    }

    $sitemap->add($url);
});


        // Dynamic category pages
        Category::all()->each(function (Category $category) use ($sitemap) {

            $sitemap->add(
                Url::create(route('categories.show', $category->slug))
                    ->setLastModificationDate($category->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        });

     

            $sitemap->writeToFile(env('SITEMAP_PATH'));

    }
}

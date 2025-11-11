<?php

namespace App\Services;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Spatie\SchemaOrg\Schema;

class SEOService
{
    public function setHome()
    {
        SEOMeta::setTitle('Pamoja Chambers - Professional Debt Collection & Legal Services in Uganda')
            ->setDescription('Leading provider of debt collection, court bailiffs, property sales, legal consultancy, and auctioneering services in Kampala, Uganda. 15+ years of excellence.')
            ->setKeywords(['debt collection Uganda', 'court bailiffs Kampala', 'property sales Uganda', 'houses for sale in Uganda', 'land for sale in Uganda', 'legal consultants', 'auctioneering services', 'Pamoja Chambers'])
            ->setCanonical(url('/'))
            ->setPrev(null)
            ->setNext(null);

        OpenGraph::setTitle('Pamoja Chambers - Professional Legal Services')
            ->setDescription('Leading debt collection and legal services in Uganda with 15+ years of experience')
            ->setUrl(url('/'))
            ->setType('website')
            ->addImage(asset('/assets/img/scale1.webp'), [
                'height' => 800,
                'width' => 1200,
                'alt' => 'Pamoja Chambers Office'
            ]);

        TwitterCard::setTitle('Pamoja Chambers - The Debt Collectors')
            ->setDescription('Professional debt collection, court bailiffs, and legal consultancy')
            ->setImage(asset('/assets/img/scale1.webp'));

        JsonLd::setTitle('Pamoja Chambers')
            ->setDescription('Professional Legal Services in Uganda')
            ->setType('Organization')
            ->addValue('url', url('/'))
            ->addValue('logo', asset('assets/img/logom.webp'))
            ->addValue('contactPoint', [
                '@type' => 'ContactPoint',
                'telephone' => '+256393243211',
                'contactType' => 'customer service',
                'areaServed' => 'UG',
                'availableLanguage' => ['en']
            ])
            ->addValue('address', [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Old Kampala, Martin Road, Solomon Plaza, 1st Floor, Suite E09, Opp Quality Supermarket, Kampala Uganda.',
                'addressLocality' => 'Kampala',
                'addressRegion' => 'Central Region',
                'postalCode' => '00256',
                'addressCountry' => 'UG'
            ])
            ->addValue('sameAs', [
                'https://www.facebook.com/pamojachambers',
                'https://www.twitter.com/pamojachambers',
                'https://www.linkedin.com/company/pamojachambers'
            ]);

        // Add Organization Schema
        $organization = Schema::organization()
            ->name('Pamoja Chambers')
            ->url(url('/'))
            ->logo(asset('images/logo.png'))
            ->description('Professional debt collection and legal services in Uganda')
            ->telephone('+256-123-456-789')
            ->email('info@pamojachambers.co.ug')
            ->address(Schema::postalAddress()
                ->streetAddress('Plot 123, Kampala Road')
                ->addressLocality('Kampala')
                ->addressRegion('Central Region')
                ->postalCode('00256')
                ->addressCountry('UG'))
            ->sameAs([
                'https://www.facebook.com/pamojachambers',
                'https://www.twitter.com/pamojachambers',
                'https://www.linkedin.com/company/pamojachambers'
            ]);

        JsonLd::addValue('structuredData', $organization->toArray());
    }

    public function setProperty($property)
    {
        $title = $property->name;
        $description = substr(strip_tags($property->short_description), 0, 160);
        $url = route('properties.show', $property->slug);
        $image = $property->getFeaturedImageUrl('preview');
        $category = $property->categories()->first();

        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setKeywords(array_filter([
                optional($category)->name,
                'properties for sale Uganda',
                'land for sale Uganda',
                'real estate Kampala',
            ]))
            ->setCanonical($url)
            ->addMeta('property:price:amount', '')
            ->addMeta('property:price:currency', 'UGX')
            ->addMeta('article:published_time', $property->created_at->toIso8601String())
            ->addMeta('article:modified_time', $property->updated_at->toIso8601String());

        OpenGraph::setTitle($property->title)
            ->setDescription($description)
            ->setUrl($url)
            ->setType('product')
            ->addImage($image, [
                'height' => 630,
                'width' => 1200,
                'alt' => $property->title
            ])
            ->addProperty('product:price:amount', '')
            ->addProperty('product:price:currency', 'UGX');



        // Add multiple property images to OpenGraph
        $galleryImages = $property->getMedia('gallery');

        if ($galleryImages->isNotEmpty()) {
            foreach ($galleryImages as $media) {
                OpenGraph::addImage($media->getUrl('large'));
            }
        }


        TwitterCard::setTitle($property->title)
            ->setDescription($description)
            ->setImage($image);

        // Real Estate Listing Schema
        $listing = Schema::realEstateListing()
            ->name($property->title)
            ->description($description)
            ->url($url)
            ->image($image)
            ->address(Schema::postalAddress()

                // ->streetAddress($property->address)
                // ->addressLocality($property->city)
                // ->addressRegion($property->region)

                ->addressCountry('UG'))
            // ->numberOfRooms($property->bedrooms)
            // ->numberOfBathroomsTotal($property->bathrooms)
            // ->floorSize(Schema::quantitativeValue()
            //     ->value($property->area)
            //     ->unitCode('MTK'))

            ->datePosted($property->created_at->toIso8601String())
            ->offers(Schema::offer()
                // ->price($property->price)
                ->priceCurrency('UGX')
                ->availability('https://schema.org/InStock')
                ->url($url));

        JsonLd::addValue('structuredData', $listing->toArray());

        // Add BreadcrumbList
        $breadcrumb = Schema::breadcrumbList()
            ->itemListElement([
                Schema::listItem()
                    ->position(1)
                    ->name('Home')
                    ->item(url('/')),
                Schema::listItem()
                    ->position(2)
                    ->name('Properties')
                    ->item(route('properties')),
                Schema::listItem()
                    ->position(3)
                    ->name($property->name)
                    ->item($url)
            ]);

        JsonLd::addValue('breadcrumb', $breadcrumb->toArray());
    }

    // public function setService($service)
    // {
    //     $title = $service->title . ' Services | Pamoja Chambers';
    //     $description = substr(strip_tags($service->description), 0, 160);
    //     $url = route('service.show', $service->slug);

    //     SEOMeta::setTitle($title)
    //         ->setDescription($description)
    //         ->setKeywords([$service->title, 'legal services Uganda', 'Kampala', 'professional services'])
    //         ->setCanonical($url);

    //     OpenGraph::setTitle($service->title)
    //         ->setDescription($description)
    //         ->setUrl($url)
    //         ->setType('article');

    //     TwitterCard::setTitle($service->title)
    //         ->setDescription($description);

    //     // Service Schema
    //     $serviceSchema = Schema::service()
    //         ->name($service->title)
    //         ->description($description)
    //         ->provider(Schema::organization()
    //             ->name('Pamoja Chambers')
    //             ->url(url('/')))
    //         ->areaServed('Uganda')
    //         ->serviceType($service->title);

    //     JsonLd::addValue('structuredData', $serviceSchema->toArray());
    // }

    public function setAbout()
    {
        SEOMeta::setTitle('About Us - Pamoja Chambers | The Debt Collectors')
            ->setDescription('Learn about Pamoja Chambers, Uganda\'s trusted legal services provider with over 15 years of experience in debt collection, court bailiffs, and property sales.')
            ->setKeywords(['about Pamoja Chambers', 'legal services Uganda', 'debt collection company', 'our history'])
            ->setCanonical(route('about'));

        OpenGraph::setTitle('About Pamoja Chambers')
            ->setDescription('15+ years of professional legal services in Uganda')
            ->setUrl(route('about'))
            ->setType('article');

        // AboutPage Schema
        $aboutPage = Schema::aboutPage()
            ->name('About Pamoja Chambers')
            ->description('Learn about our The Debt Collectors in Uganda')
            ->url(route('about'));

        JsonLd::addValue('structuredData', $aboutPage->toArray());
    }

    public function setContact()
    {
        SEOMeta::setTitle('Contact Us - Pamoja Chambers | Get in Touch')
            ->setDescription('Contact Pamoja Chambers for professional legal services. Located in Kampala, Uganda. Call +256393243211 or email pamojachambers@gmail.com')
            ->setKeywords(['contact Pamoja Chambers', 'legal services Kampala', 'get in touch', 'schedule consultation'])
            ->setCanonical(route('contact'));

        OpenGraph::setTitle('Contact Pamoja Chambers')
            ->setDescription('Get in touch with our legal experts')
            ->setUrl(route('contact'))
            ->setType('website');

        // ContactPage Schema
        $contactPage = Schema::contactPage()
            ->name('Contact Pamoja Chambers')
            ->description('Get in touch with our professional team')
            ->url(route('contact'));

        JsonLd::addValue('structuredData', $contactPage->toArray());
    }

    public function setProperties()
    {
        SEOMeta::setTitle('Properties for Sale in Uganda | Pamoja Chambers')
            ->setDescription('Browse our exclusive property listings in Kampala and across Uganda. Villas, apartments, commercial properties, and land for sale.')
            ->setKeywords(['properties for sale Uganda', 'real estate Kampala', 'houses for sale', 'buy property Uganda'])
            ->setCanonical(route('properties'));

        OpenGraph::setTitle('Properties for Sale in Uganda')
            ->setDescription('Exclusive property listings across Uganda')
            ->setUrl(route('properties'))
            ->setType('website');

        // CollectionPage Schema
        $collectionPage = Schema::collectionPage()
            ->name('Properties for Sale')
            ->description('Browse our property listings')
            ->url(route('properties'));

        JsonLd::addValue('structuredData', $collectionPage->toArray());
    }
}
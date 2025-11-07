📋 Step-by-Step SEO Implementation Guide
Step 1: Install Required Packages
bash# Core SEO Package
composer require artesaos/seotools

# Sitemap Generator
composer require spatie/laravel-sitemap

# Schema.org JSON-LD
composer require spatie/schema-org

# Image Optimization (important for Core Web Vitals)
composer require spatie/image-optimizer

# Optional but recommended
composer require spatie/laravel-sluggable
composer require spatie/laravel-robots-middleware
Step 2: Configure SEO Tools
config/seotools.php (publish config first)
bashphp artisan vendor:publish --provider="Artesaos\SEOTools\Providers\SEOToolsServiceProvider"
Edit config/seotools.php:
php

<?php
return [
    'meta' => [
        'defaults' => [
            'title' => 'Pamoja Chambers - Professional Debt Collection & Legal Services',
            'titleBefore' => false,
            'description' => 'Leading debt collection, court bailiffs, property sales, and legal consultancy services in Uganda. Professional, ethical, and results-driven.',
            'separator' => ' | ',
            'keywords' => ['debt collection Uganda', 'court bailiffs', 'property sales', 'legal consultants', 'auctioneering Kampala'],
            'canonical' => null,
            'robots' => 'index,follow',
        ],
        'webmaster_tags' => [
            'google' => null, // Add Google Search Console verification
            'bing' => null,   // Add Bing Webmaster verification
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],
        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title' => 'Pamoja Chambers - Professional Legal Services',
            'description' => 'Leading debt collection and legal services in Uganda',
            'url' => null,
            'type' => 'website',
            'site_name' => 'Pamoja Chambers',
            'images' => ['/images/og-image.jpg'], // Create this image (1200x630px)
        ],
    ],
    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@pamojachambers', // Your Twitter handle
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title' => 'Pamoja Chambers',
            'description' => 'Professional Legal Services in Uganda',
            'type' => 'Organization',
        ],
    ],
];
Step 3: Create SEO Service Class
Create app/Services/SEOService.php:
php<?php

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
            ->setKeywords(['debt collection Uganda', 'court bailiffs Kampala', 'property sales Uganda', 'legal consultants', 'auctioneering services', 'Pamoja Chambers'])
            ->setCanonical(url('/'))
            ->setPrev(null)
            ->setNext(null);

        OpenGraph::setTitle('Pamoja Chambers - Professional Legal Services')
            ->setDescription('Leading debt collection and legal services in Uganda with 15+ years of experience')
            ->setUrl(url('/'))
            ->setType('website')
            ->addImage(asset('images/og-home.jpg'), [
                'height' => 630,
                'width' => 1200,
                'alt' => 'Pamoja Chambers Office'
            ]);

        TwitterCard::setTitle('Pamoja Chambers - Legal Services Uganda')
            ->setDescription('Professional debt collection, court bailiffs, and legal consultancy')
            ->setImage(asset('images/twitter-home.jpg'));

        JsonLd::setTitle('Pamoja Chambers')
            ->setDescription('Professional Legal Services in Uganda')
            ->setType('Organization')
            ->addValue('url', url('/'))
            ->addValue('logo', asset('images/logo.png'))
            ->addValue('contactPoint', [
                '@type' => 'ContactPoint',
                'telephone' => '+256-123-456-789',
                'contactType' => 'customer service',
                'areaServed' => 'UG',
                'availableLanguage' => ['en', 'sw']
            ])
            ->addValue('address', [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Plot 123, Kampala Road',
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
        $title = $property->title . ' - ' . $property->location . ' | Pamoja Chambers';
        $description = substr(strip_tags($property->description), 0, 160);
        $url = route('property.show', $property->slug);
        $image = $property->featured_image_url;

        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setKeywords([$property->type, $property->location, 'property for sale Uganda', 'real estate Kampala'])
            ->setCanonical($url)
            ->addMeta('property:price:amount', $property->price)
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
            ->addProperty('product:price:amount', $property->price)
            ->addProperty('product:price:currency', 'UGX');

        // Add multiple property images
        if ($property->gallery_images) {
            foreach ($property->gallery_images as $galleryImage) {
                OpenGraph::addImage($galleryImage);
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
                ->streetAddress($property->address)
                ->addressLocality($property->city)
                ->addressRegion($property->region)
                ->addressCountry('UG'))
            ->numberOfRooms($property->bedrooms)
            ->numberOfBathroomsTotal($property->bathrooms)
            ->floorSize(Schema::quantitativeValue()
                ->value($property->area)
                ->unitCode('MTK'))
            ->datePosted($property->created_at->toIso8601String())
            ->offers(Schema::offer()
                ->price($property->price)
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
                    ->item(route('properties.index')),
                Schema::listItem()
                    ->position(3)
                    ->name($property->title)
                    ->item($url)
            ]);

        JsonLd::addValue('breadcrumb', $breadcrumb->toArray());
    }

    public function setService($service)
    {
        $title = $service->title . ' Services | Pamoja Chambers';
        $description = substr(strip_tags($service->description), 0, 160);
        $url = route('service.show', $service->slug);

        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setKeywords([$service->title, 'legal services Uganda', 'Kampala', 'professional services'])
            ->setCanonical($url);

        OpenGraph::setTitle($service->title)
            ->setDescription($description)
            ->setUrl($url)
            ->setType('article');

        TwitterCard::setTitle($service->title)
            ->setDescription($description);

        // Service Schema
        $serviceSchema = Schema::service()
            ->name($service->title)
            ->description($description)
            ->provider(Schema::organization()
                ->name('Pamoja Chambers')
                ->url(url('/')))
            ->areaServed('Uganda')
            ->serviceType($service->title);

        JsonLd::addValue('structuredData', $serviceSchema->toArray());
    }

    public function setAbout()
    {
        SEOMeta::setTitle('About Us - Pamoja Chambers | 15+ Years of Legal Excellence')
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
            ->description('Learn about our 15+ years of legal excellence in Uganda')
            ->url(route('about'));

        JsonLd::addValue('structuredData', $aboutPage->toArray());
    }

    public function setContact()
    {
        SEOMeta::setTitle('Contact Us - Pamoja Chambers | Get in Touch')
            ->setDescription('Contact Pamoja Chambers for professional legal services. Located in Kampala, Uganda. Call +256-123-456-789 or email info@pamojachambers.co.ug')
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
            ->setCanonical(route('properties.index'));

        OpenGraph::setTitle('Properties for Sale in Uganda')
            ->setDescription('Exclusive property listings across Uganda')
            ->setUrl(route('properties.index'))
            ->setType('website');

        // CollectionPage Schema
        $collectionPage = Schema::collectionPage()
            ->name('Properties for Sale')
            ->description('Browse our property listings')
            ->url(route('properties.index'));

        JsonLd::addValue('structuredData', $collectionPage->toArray());
    }
}
Step 4: Update Your Controllers
app/Http/Controllers/HomeController.php
php<?php

namespace App\Http\Controllers;

use App\Services\SEOService;

class HomeController extends Controller
{
    protected $seoService;

    public function __construct(SEOService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index()
    {
        $this->seoService->setHome();
        
        return view('home');
    }
}
app/Http/Controllers/PropertyController.php
php<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\SEOService;

class PropertyController extends Controller
{
    protected $seoService;

    public function __construct(SEOService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index()
    {
        $this->seoService->setProperties();
        
        $properties = Property::paginate(12);
        
        return view('properties.index', compact('properties'));
    }

    public function show($slug)
    {
        $property = Property::where('slug', $slug)->firstOrFail();
        
        $this->seoService->setProperty($property);
        
        return view('properties.show', compact('property'));
    }
}
Step 5: Update Your Layout Blade File
resources/views/layouts/app.blade.php
blade


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- SEO Meta Tags --}}
    {!! SEO::generate() !!}
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    
    {{-- Preconnect for performance --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    {{-- DNS Prefetch --}}
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    
    {{-- Alternate Language Tags (if you have multiple languages) --}}
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="sw" href="{{ url()->current() . '?lang=sw' }}">
    
    @stack('styles')
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @yield('content')
    
    @stack('scripts')
</body>
</html>


Step 6: Generate XML Sitemap
Create app/Console/Commands/GenerateSitemap.php:
bashphp artisan make:command GenerateSitemap
php<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Property;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static pages
        $sitemap->add(Url::create('/')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));

        $sitemap->add(Url::create('/about')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create('/services')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create('/properties')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.9));

        $sitemap->add(Url::create('/contact')
            ->setLastModificationDate(Carbon::now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));

        // Add dynamic property pages
        Property::all()->each(function (Property $property) use ($sitemap) {
            $sitemap->add(Url::create("/properties/{$property->slug}")
                ->setLastModificationDate($property->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8)
                ->addImage($property->featured_image_url, $property->title));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
Schedule it in app/Console/Kernel.php:
phpprotected function schedule(Schedule $schedule)
{
    $schedule->command('sitemap:generate')->daily();
}
```

### Step 7: Create robots.txt

**public/robots.txt**
```
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/
Disallow: /*.json$
Disallow: /*?*print=

Sitemap: https://pamojachambers.co.ug/sitemap.xml

# Performance
Crawl-delay: 1
Step 8: Add Structured Data Middleware
Create app/Http/Middleware/AddSecurityHeaders.php:
bashphp artisan make:middleware AddSecurityHeaders
php<?php

namespace App\Http\Middleware;

use Closure;

class AddSecurityHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        return $response;
    }
}
Register in bootstrap/app.php (Laravel 12):
php->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \App\Http\Middleware\AddSecurityHeaders::class,
    ]);
})
Step 9: Create Property Model with SEO Fields
Add to your property migration:
php$table->string('meta_title')->nullable();
$table->text('meta_description')->nullable();
$table->text('meta_keywords')->nullable();
$table->string('og_image')->nullable();
<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\SEOService;
use App\Models\Category;

class FrontendController extends Controller
{

    protected $seoService;

    public function __construct(SEOService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index()
    {
        $this->seoService->setHome();

        $categories = Category::all();

        $properties = Property::with(['categories', 'media'])
            ->where('is_published', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('properties', 'categories'));
    }


    public function about()
    {
        $this->seoService->setAbout();
        return view('pages.about');
    }

    public function services()
    {
        $this->seoService->setServicesSeo();
        return view('pages.services');
    }

    public function contact()
    {
        $this->seoService->setContact();

        return view('pages.contact');
    }



    public function properties()
    {
        $this->seoService->setProperties();

        $properties = Property::with(['categories', 'media'])
            ->where('is_published', true)
            ->latest()
            ->paginate(50);

        return view('pages.properties', compact('properties'));
    }

    public function single($slug)
    {
        $property = Property::with(['categories', 'media'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $this->seoService->setProperty($property);

        // Get category IDs of this property
        $categoryIds = $property->categories->pluck('id')->toArray();

        // Find 2 other properties sharing these categories
        $relatedProperties = Property::with('media')
            ->where('is_published', true)
            ->where('id', '!=', $property->id)
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            })
            ->inRandomOrder()
            ->take(2)
            ->get();

        return view('pages.single-property', compact('property', 'relatedProperties'));
    }


    public function category($slug)
    {
        $category = Category::with(['properties'])
            ->where('slug', $slug)
            ->firstOrFail();

        $this->seoService->setCategorySeo($category);

        $properties = $category->properties()
            ->where('is_published', 1)
            ->with('categories')
            ->paginate(12);


        return view('pages.show-category', compact('category', 'properties'));
    }



}

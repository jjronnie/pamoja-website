<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\SEOService;

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
        
        return view('welcome');
    }


    public function about()
    {
         $this->seoService->setAbout();
        return view('pages.about');
    }

    public function services()
    {
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

    return view('pages.single-property', compact('property'));
}




}

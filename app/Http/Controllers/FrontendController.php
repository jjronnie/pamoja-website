<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function single()
    {
        return view('pages.single-property');
    }


 public function properties()
{
    $properties = Property::with(['categories', 'media'])
        ->where('is_published', true)
        ->latest()
        ->paginate(50);

    return view('pages.properties', compact('properties'));
}




}

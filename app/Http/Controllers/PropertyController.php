<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Services\SitemapService;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the relationships
        $properties = Property::with(['categories', 'creator', 'media'])
            ->latest()
            ->paginate(50);

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.properties.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $data = $request->validated();

     

        if (isset($data['features'])) {
    // Convert array of key-value pairs to associative array
    $featuresArray = [];
    foreach ($data['features'] as $item) {
        if (!empty($item['key'])) {
            $featuresArray[$item['key']] = $item['value'] ?? '';
        }
    }
    $data['features'] = json_encode($featuresArray);
} else {
    $data['features'] = json_encode([]);
}



        // Create the property
        $property = Property::create(array_merge(
            $data,
            ['created_by' => Auth::id()]
        ));

        // Sync categories
        $property->categories()->sync($request->validated('categories'));

        // Add featured image if provided
        if ($request->hasFile('featured_image')) {
            $property->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured');
        }

        // Add gallery images if provided
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $property->addMedia($image)
                    ->toMediaCollection('gallery');
            }
        }

        SitemapService::update();

        return redirect()->route('admin.properties.show', $property)
            ->with('success', 'Property created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property->load(['categories', 'creator', 'media']);
        $categories = Category::orderBy('name')->get();

        return view('admin.properties.show', compact('property', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        // Load the property's current categories for pre-selection
        $property->load('categories', 'media');

        $categories = Category::orderBy('name')->get();

        return view('admin.properties.edit', compact('property', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {

         $data = $request->validated();

      if (isset($data['features'])) {
            // Convert array of key-value pairs to associative array
            $featuresArray = [];
            foreach ($data['features'] as $item) {
                if (!empty($item['key'])) {
                    $featuresArray[$item['key']] = $item['value'] ?? '';
                }
            }
            $data['features'] = json_encode($featuresArray);
        } else {
            $data['features'] = json_encode([]);
        }

        
    $property->update($data);
        // Update property fields

        // Re-sync categories
        $property->categories()->sync($request->validated('categories'));

        // Handle featured image removal
        if ($request->input('remove_featured')) {
            $property->clearMediaCollection('featured');
        }

        // Handle featured image upload (replaces existing)
        if ($request->hasFile('featured_image')) {
            $property->clearMediaCollection('featured');
            $property->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured');
        }

        // Handle gallery image removal
        if ($request->has('remove_gallery_ids')) {
            foreach ($request->input('remove_gallery_ids') as $mediaId) {
                $media = $property->media()->find($mediaId);
                if ($media) {
                    $media->delete();
                }
            }
        }

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $property->addMedia($image)
                    ->toMediaCollection('gallery');
            }
        }

        SitemapService::update();


        return redirect()->route('admin.properties.show', $property)->with('success', 'Property updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();




        return redirect()->route('admin.properties.index')->with('success', 'Property deleted.');
    }

    /**
     * Remove a single gallery image
     */


    public function removeGalleryImage(Property $property, $mediaId)
    {
        try {
            $media = $property->getMedia('gallery')->where('id', $mediaId)->first();

            if ($media) {
                $media->delete();
                return redirect()->back()->with('success', 'Image deleted successfully.');
            }

            return redirect()->back()->with('error', 'An Error Occured.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting image: ' . $e->getMessage());
        }
    }

    public function addGalleryImage(Request $request, Property $property)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        try {
            // Attach new image to the gallery collection
            $property->addMediaFromRequest('image')->toMediaCollection('gallery');

            return redirect()->back()->with('success', 'Image added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload image: ' . $e->getMessage());
        }
    }

    public function toggleFeatured(Property $property)
    {
        $property->is_featured = !$property->is_featured; // switch true/false
        $property->save();

        $status = $property->is_featured ? 'added to' : 'removed from';
        return redirect()->back()->with('success', "Property successfully {$status} featured.");
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        // Create the property
        $property = Property::create(array_merge(
            $request->validated(),
            ['created_by' => Auth::id()]
        ));

        // Sync categories
        $property->categories()->sync($request->validated('categories'));

        // Handle Featured Image
        $this->uploadMedia($property, $request, 'featured_image');

        // Handle Gallery Photos
        $this->uploadMedia($property, $request, 'photos');

        return redirect()->route('admin.properties.show', $property)->with('success', 'Property created!');
    }

    /**
     * Display the specified resource.
     */
   public function show(Property $property)
    {
        $property->load(['categories', 'creator', 'media']);

        return view('admin.properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Property $property)
    {
        // Load the property's current categories for pre-selection
        $property->load('categories'); 

        $categories = Category::orderBy('name')->get();

        return view('admin.properties.edit', compact('property', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StorePropertyRequest $request, Property $property) // Use the request again
    {
        // Update property fields
        $property->update($request->validated());

        // Re-sync categories
        $property->categories()->sync($request->validated('categories'));

        // Handle Featured Image (deletes old one automatically)
        $this->uploadMedia($property, $request, 'featured_image');

        // Handle Gallery Photos (deletes ALL old ones and adds new ones)
        // Note: 'photos' is the collection name, not the request field name
        $this->uploadMedia($property, $request, 'photos', 'photos');


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

    private function uploadMedia(Property $property, Request $request, string $requestField, string $collectionName = null)
    {
        // If no collection name is provided, use the request field name
        if (is_null($collectionName)) {
            $collectionName = $requestField;
        }

        if ($request->hasFile($requestField)) {

            // If it's a "singleFile" collection, the package handles deleting the old one.
            // If it's a multi-file collection, we clear it first to replace images.
            if ($collectionName === 'photos') {
                $property->clearMediaCollection('photos');
            }

            // The 'addMediaFromRequest' handles single files
            if ($requestField === 'featured_image') {
                $property->addMediaFromRequest($requestField)
                    ->usingName(Str::slug($property->name) . '-' . Str::random(4)) // Custom file name
                    ->toMediaCollection($collectionName);
            }

            // Handle array of files for 'photos'
            if ($requestField === 'photos') {
                foreach ($request->file($requestField) as $file) {
                    $property->addMedia($file)
                        ->usingName(Str::slug($property->name) . '-' . Str::random(4)) // Custom file name
                        ->toMediaCollection($collectionName);
                }
            }
        }
    }
    
}

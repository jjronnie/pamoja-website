<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        return redirect()->route('properties.show', $property)->with('success', 'Property created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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


        return redirect()->route('properties.show', $property)->with('success', 'Property updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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

<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set to true to allow anyone to use this form
    }

 public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'short_description' => 'nullable|string|max:255',
        'location' => 'nullable|string',
        'directions' => 'nullable|string',
       

         'features' => 'nullable|array',
        'features.*.key' => 'required_with:features|string|max:255',
        'features.*.value' => 'required_with:features|string|max:255',

        'status' => 'nullable|string|max:100',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',
        'is_published' => 'sometimes|boolean',

        'categories' => 'required|array|min:1',
        'categories.*' => 'exists:categories,id',
        'featured_image' => 'nullable|image|max:5120',
        'gallery_images.*' => 'nullable|image|max:5120',
    ];
}

}
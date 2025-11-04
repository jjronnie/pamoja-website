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
            'size' => 'nullable|string|max:100',
            'ownership' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'is_published' => 'sometimes|boolean',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'featured_image' => 'required|image|max:5120',
            'photos' => 'nullable|array|max:5',
            'photos.*' => 'image|max:5120',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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

            'featured_image' => 'nullable|image|max:5120',
            'gallery_images.*' => 'nullable|image|max:5120',

            'remove_featured' => 'nullable|boolean',
            'remove_gallery_ids' => 'nullable|array',

        ];
    }
}

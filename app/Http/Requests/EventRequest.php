<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        $slug = $this->route('slug');

        return [
            'title'         => 'string|required|max:255|unique:events,title,' . $slug . ',slug',
            'slug'          => 'string|required|max:255|unique:events,slug,' . $slug . ',slug',
            'start_date'    => 'required|date|before_or_equal:end_date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'category_id'   => 'required|integer',
            'location'      => 'required|max:255',
            'is_paid'       => 'required|boolean',
            'price'         => 'nullable|integer',
            'images'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'   => 'nullable',
            'status'        => 'required|boolean',
            'speakers'      => 'required|array'
        ];
    }
}

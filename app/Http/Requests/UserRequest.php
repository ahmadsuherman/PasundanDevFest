<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $username = $this->route('username');

        return [
            'avatar'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username'      => 'required|regex:/^[a-z0-9]+$/|max:20|unique:users,username,' . $username . ',username',
            'fullname'      => 'required',
            'email'         => 'required|email|unique:users,username,' . $username . ',username',
            'bio'           => 'nullable',
            'links'         => 'nullable|array'
        ];
    }

    public function prepareForValidation()
    {
        // Modifikasi request sebelum validasi, misalnya, mendecode 'links' menjadi array
        if ($this->has('links')) {
            $this->merge([
                'links' => json_decode($this->input('links'), true),
            ]);
        }
    }
}

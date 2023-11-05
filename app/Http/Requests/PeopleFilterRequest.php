<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'age' => ['nullable', 'integer'],
            'text' => ['nullable', 'string'],
            'sex' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'birthplace' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string|max:500',
            'slug' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'The Message Cann\'t be empty.',
            'content.max' => 'The Maximum Size of a message is 500 character.',
            'content.string' => 'The Message must be a text combination of alphabets, numbers and special characters',
            'slug.required' => 'The Slug of the user is needed'
        ];
    }
}

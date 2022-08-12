<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlManagerRequest extends FormRequest
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
            'url' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
                'url.required' => 'Url field required',
                'url.url' => 'Not valid url',

        ];
    }
}

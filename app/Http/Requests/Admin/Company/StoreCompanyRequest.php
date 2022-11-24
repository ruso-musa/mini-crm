<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','string'],
            'file' =>   ['nullable','image',
                          'mimes:jpeg,png,jpg,gif,svg',
                          'dimensions:min_width=100,min_height=100'
                        ],
                        
            'website' => ['required', 'url']          
        ];
    }

    /**
       * Get the validation messages that apply to the request.
       *
       * @return array
    */
    public function messages(){
        return [
            'file.dimensions' => 'Image min width and min height must be 100px',
        ];
    }
}

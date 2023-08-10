<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'name'=>[
                'required',
                'max:255'
            ],

            'description'=>[
                'required',
                'max:1000'
            ],
            'price'=>[
                'numeric',
                'required',
                'min:0'
            ],
            'image'=>[

            ],
            'category_id'=>[
                'required',
                'numeric',
                'min:0'
            ],
        ];
    }
}

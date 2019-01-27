<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewArticleRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'total_in_shelf' => 'required|numeric',
            'total_in_vault' => 'required|numeric',
            'store_id' => 'required|exists:stores,id'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'store_id.required' => 'Store field is required',
            'store_id.exists' => 'The store is not found'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;

class ProductStore extends FormRequest
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
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:1|max:300',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1|max:9',
            'quantity' => 'required|string|min:2|max:15',
            'pictures' => 'required',
        ];
    }
}

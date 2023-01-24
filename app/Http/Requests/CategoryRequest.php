<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('id');
        return  [
            'name' => 'required|string|min:2|max:255|unique:categories,name,'.$id,
            'parent_id' => 'nullable|int|exists:categories,id',
            'description' => 'nullable|string|min:5',
            'image' => 'nullable|mimes:png,jpg|'
        ];
    }
}

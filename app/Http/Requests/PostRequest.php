<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:100',
//            'sub_title' => 'required',
            'content' => 'required',
            'is_feature' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '標題',
//            'sub_title' => '副標題',
            'content' => '內容',
            'is_feature' => '精選'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '請加上標題。',
            'content.required' => '請加上內容。',
        ];
    }
}

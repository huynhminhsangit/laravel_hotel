<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private $table            = 'product';

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
        $id = $this->id;
        $condName    = "bail|required|between:5,100|unique:$this->table,name";
        $condSlug    = "bail|required|between:5,100|unique:$this->table,name";
        $condPrice   = "bail|required|numeric";
        $condContent = "bail|required|min:5";
        $condStatus  = 'bail|in:active,inactive';
        $condCategory = 'bail|not_in:default';

        if (!empty($id)) {
            $condName .= ",$id";
            $condSlug .= ",$id";
            // $condThumb = 'bail|image|max: 3000';
        }

        return [
            'name'        => $condName,
            'slug'        => $condSlug,
            'price'       => $condPrice,
            'content'     => $condContent,
            'status'      => $condStatus,
            'category_id' => $condCategory,
            'content'     => $condContent,
            // 'document'    => $condThumb,
            // 'document' => 'required',
            // 'document.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
            // 'name.min'      => 'Name :input chiều dài phải có ít nhất :min ký tứ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}

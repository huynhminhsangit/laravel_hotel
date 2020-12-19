<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RssRequest extends FormRequest
{
    private $table            = 'slider';
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
        $condName  = "bail|required|between:5,100|unique:$this->table,name";

        if(!empty($id)){ // edit
            $condName  .= ",$id";
        }
        return [
            'name'      => $condName,
            'link'      => 'bail|required|min:5|url',
            'status'    => 'bail|in:active,inactive',
            'type_source'    => 'bail|in:vnexpress,cafebiz',
            'ordering'  => 'bail|required',
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    private $table            = 'employee';
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
        $condThumb = 'bail|required|image|max:1500';

        if(!empty($id)){ // edit
            $condThumb = 'bail|image|max:1500';
        }
        return [
            'fullname' => "bail|required|between:5,100",
            'position'  => 'bail|required|min:5',
            'phone'     => 'bail|required|min:5',
            'thumb'     => $condThumb
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

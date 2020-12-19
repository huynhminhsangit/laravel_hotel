<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    private $table            = 'coupon';
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

        $condCode      = "bail|required|between:5,100|unique:$this->table,code";
        $condTotal     = 'bail|required';
        $condStart     = 'bail|required';
        $condEnd       = 'bail|required';
        $condType      = 'bail|in:direct,percent';
        $condValue     = 'bail|required';
        $condDateStart = 'bail|required|date|after:yesterday';
        $condDateEnd   = 'bail|required|date|after_or_equal:start';

        if(!empty($id)){ // edit
            $condCode  .= ",$id";
        }
        return [
            'code'        => $condCode,
            'total'       => $condTotal,
            'start_price' => $condStart,
            'end_price'   => $condEnd,
            'type'        => $condType,
            'value'       => $condValue,
            'start'       => $condDateStart,
            'end'         => $condDateEnd,
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

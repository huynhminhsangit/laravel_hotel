<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    private $table            = 'reservation';
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
            'check_in'   => 'bail|required|',
            'check_out'  => 'bail|required|after:check_in',
        ];
    }

    public function messages()
    {
        return [
            'check_in.required' => 'Vui lòng chọn ngày đến',
            'check_out.required' => 'Vui lòng chọn ngày đi',
            'check_out.after' => 'Ngày đi không hợp lệ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}

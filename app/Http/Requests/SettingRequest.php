<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    private $table            = 'setting';
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
        $id   = $this->id;
        // $task = $this->task;

        if($this->task_email == 'change-setting-email'){
            $task = 'change-setting-email';
        }else if($this->task_general == 'change-setting-general'){
            $task = 'change-setting-general';
        }else if($this->task_social == 'change-setting-social'){
            $task = 'change-setting-social';
        }else if($this->task_seo == 'change-setting-seo'){
            $task = 'change-setting-seo';
        }else if($this->task_script == 'change-setting-script'){
            $task = 'change-setting-script';
        }

        $condLogo        = '';
        $condHotline     = '';
        $condCopyright   = '';
        $condWorkingDate = '';
        $condSlogan      = '';
        $condMap         = '';
        $condLocation    = '';
        $condIntroduce   = '';
        $condEmail       = '';
        $condPassword    = '';
        $condBcc         = '';
        $condFacebook    = '';
        $condGroup       = '';
        $condFanPage     = '';
        $condYoutube     = '';
        $condSeoKeyword  = '';
        $condSeoDescription = '';
        $condScriptHead  = '';
        $condScriptBody = '';

        // session()->put('task', $task);
        // switch ($task) {
        //     case 'change-setting-general':
        //         $condLogo           = 'bail|image|max:500';
        //         $condHotline        = "bail|";
        //         $condCopyright      = "bail|min:0";
        //         $condWorkingDate    = 'bail|min:0';
        //         $condSlogan         = 'bail|min:0';
        //         $condMap            = 'bail|min:0';
        //         $condLocation       = 'bail|min:0';
        //         $condIntroduce      = 'bail|min:0';
        //         break;
        //     case 'change-setting-email':
        //         $condEmail          = '';
        //         $condPassword       = 'bail|between:5,100';
        //         $condBcc            = 'bail|between:5,100';
        //         break;
        //     case 'change-setting-social':
        //         $condFacebook       = 'bail|url';
        //         $condGroup          = 'bail|url';
        //         $condFanPage        = 'bail|url';
        //         $condYoutube        = 'bail|url';
        //         break;
        //     case 'change-setting-seo':
        //         $condSeoKeyword       = 'bail|required|min:5';
        //         $condSeoDescription   = 'bail|required|min:10';
        //         break;
        //     case 'change-setting-script':
        //         $condScriptHead       = 'bail|url';
        //         $condScriptBody       = 'bail|url';
        //         break;
        //     default:
        //         break;
        // }


        return [
            'logo'         => $condLogo,
            'hotline'      => $condHotline,
            'copyright'    => $condCopyright,
            'working_date' => $condWorkingDate,
            'slogan'       => $condSlogan,
            'map'          => $condMap,
            'location'     => $condLocation,
            'introduce'    => $condIntroduce,
            'email'        => $condEmail,
            'password'     => $condPassword,
            'bcc'          => $condBcc,
            'facebook'     => $condFacebook,
            'group'        => $condGroup,
            'fan_page'     => $condFanPage,
            'youtube'      => $condYoutube,
            'meta_keyword' => $condSeoKeyword,
            'meta_description' => $condSeoDescription,
            'script_head' => $condScriptHead,
            'script_body' => $condScriptBody,
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

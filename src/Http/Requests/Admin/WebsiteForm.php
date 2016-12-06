<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteForm extends FormRequest
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
            'website_name' => 'required|max:255',
            'website_domain' => 'required|active_url',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    /*public function messages()
    {
        return [
            'website_name.required' => '网站名称不能为空',
            'website_domain.required'  => '站点域名不能为空',
        ];
    }*/

}

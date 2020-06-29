<?php

namespace App\Http\Requests;

class LoginRequest extends BaseRequest
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
        return $this->getRules();;
    }

    public function createRules() {
        return [
            'name' => 'required|min:3|max:255',
            'password' => 'required|min:6|max:255'
        ];
    }

    public function updateRules() {
        return [

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'إسم المستخدم',
            'password' => 'كلمة المرور',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'إسم المستخدم مطلوب',
            'name.min' => 'إسم المستخدم يجب ألا يقل عن 3 احرف',
            'name.max' => 'إسم المستخدم يجب ألا يزيد عن 255 حرف',
            'password.required'  => 'كلمة المرور مطلوبة',
            'password.min'  => 'كلمة المرور يجب ألا تقل عن 6 احرف',
            'password.max'  => 'كلمة المرور يجب ألا تزيد عن 255 احرف',
        ];
    }
}

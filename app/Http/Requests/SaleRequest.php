<?php

namespace App\Http\Requests;

class SaleRequest extends BaseRequest
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
            'item_id' => 'required|numeric|exists:items,id',
            'quantity' => 'required|min:0|numeric',
        ];
    }

    public function updateRules() {
        return [

        ];
    }

    public function attributes()
    {
        return [
            'item_id' => 'الصنف',
            'quantity' => 'الكمية',
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => 'الصنف مطلوب',
            'item_id.numeric' => 'الصنف غير مسجل بقاعدة البيانات',
            'item_id.exists' => 'الصنف غير مسجل بقاعدة البيانات',
            'quantity.required' => 'الكمية مطلوبة',
            'quantity.min' => 'الكمية يجب ألا تقل عن 0',
            'quantity.numeric' => 'الكمية يجب أن تكون رقم',
        ];
    }
}

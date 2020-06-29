<?php

namespace App\Http\Requests;

class ItemRequest extends BaseRequest
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
            'name' => 'required|min:3|max:255|string|unique:items,name',
            'quantity' => 'required|min:0|numeric',
            'buy_price' => 'required|min:0|numeric',
            'sell_price' => 'required|min:0|numeric',
        ];
    }

    public function updateRules() {
        return [
            'quantity' => 'required|min:0|numeric',
            'buy_price' => 'required|min:0|numeric',
            'sell_price' => 'required|min:0|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'إسم المستخدم',
            'quantity' => 'الكمية',
            'buy_price' => 'سعر الشراء',
            'sell_price' => 'سعر البيع',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'إسم الصنف مطلوب',
            'name.min' => 'إسم الصنف يجب ألا يقل عن 3 احرف',
            'name.max' => 'إسم الصنف يجب ألا يزيد عن 255 حرف',
            'name.string' => 'إسم الصنف يجب أن يكون نص',
            'name.unique' => 'إسم الصنف موجود بالفعل',
            'quantity.required' => 'الكمية مطلوبة',
            'quantity.min' => 'الكمية يجب ألا تقل عن 0',
            'quantity.numeric' => 'الكمية يجب أن تكون رقم',
            'buy_price.required' => 'سعر الشراء مطلوب',
            'buy_price.min' => 'سعر الشراء يجب ألا يقل عن 0',
            'buy_price.numeric' => 'سعر الشراء يجب أن يكون رقم',
            'sell_price.required' => 'سعر البيع مطلوب',
            'sell_price.min' => 'سعر البيع يجب ألا يقل عن 0',
            'sell_price.numeric' => 'سعر البيع يجب أن يكون رقم',
        ];
    }
}

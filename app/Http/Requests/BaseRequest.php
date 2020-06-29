<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
     * Get rules.
     */
    public function getRules()
    {
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return $this->updateRules();
        } elseif ($this->isMethod('post')) {
            return $this->createRules();
        }
    }

    /**
     * Get the creation validation rules.
     */
    public function createRules()
    {
    }

    /**
     * Get the update validation rules.
     */
    public function updateRules()
    {
    }
}

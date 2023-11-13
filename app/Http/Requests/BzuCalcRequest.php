<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BzuCalcRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'goal' => 'required',
            'weight_now' => 'required',
            'height' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'activity' => 'required',
            'desired_weight' => 'required',
        ];
    }
}

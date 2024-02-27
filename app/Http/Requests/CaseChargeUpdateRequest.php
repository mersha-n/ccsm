<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseChargeUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'deptName' => ['required', 'max:255', 'string'],
            'mid' => ['required', 'max:255', 'string'],
            'rank' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'crimeDescription' => ['required', 'max:255', 'string'],
            'crimeDate' => ['required', 'date'],
            'ChargeDate' => ['required', 'date'],
        ];
    }
}

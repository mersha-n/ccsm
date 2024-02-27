<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
            'case_hear_id' => ['required', 'exists:case_hears,id'],
            'date' => ['required', 'date'],
            'Description' => ['required', 'max:255', 'string'],
        ];
    }
}

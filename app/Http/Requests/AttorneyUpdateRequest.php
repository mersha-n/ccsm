<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttorneyUpdateRequest extends FormRequest
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
            'court_id' => ['required', 'exists:courts,id'],
            'attorneyID' => ['required', 'max:255', 'string'],
            'Name' => ['required', 'max:255', 'string'],
            'Address' => ['required', 'max:255', 'string'],
            'State' => ['required', 'max:255', 'string'],
            'courtType' => ['required', 'max:255', 'string'],
            'EmpType' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WittnessUpdateRequest extends FormRequest
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
            'wittnessID' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'wittnessType' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseHearUpdateRequest extends FormRequest
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
            'judge_id' => ['required', 'exists:judges,id'],
            'attorney_id' => ['required', 'exists:attorneys,id'],
            'case_charge_id' => ['required', 'exists:case_charges,id'],
            'wittness_id' => ['required', 'exists:wittnesses,id'],
            'CaseID' => ['required', 'max:255', 'string'],
            'casename' => ['required', 'max:255', 'string'],
            'fileNumber' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'location' => ['required', 'max:255', 'string'],
            'caseStartDate' => ['required', 'date'],
            'description' => ['required', 'max:255', 'string'],
        ];
    }
}

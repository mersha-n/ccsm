<?php

namespace App\Http\Controllers\Api;

use App\Models\Judge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaseHearResource;
use App\Http\Resources\CaseHearCollection;

class JudgeCaseHearsController extends Controller
{
    public function index(Request $request, Judge $judge): CaseHearCollection
    {
        $this->authorize('view', $judge);

        $search = $request->get('search', '');

        $caseHears = $judge
            ->caseHears()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaseHearCollection($caseHears);
    }

    public function store(Request $request, Judge $judge): CaseHearResource
    {
        $this->authorize('create', CaseHear::class);

        $validated = $request->validate([
            'court_id' => ['required', 'exists:courts,id'],
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
        ]);

        $caseHear = $judge->caseHears()->create($validated);

        return new CaseHearResource($caseHear);
    }
}

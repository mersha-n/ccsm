<?php

namespace App\Http\Controllers\Api;

use App\Models\Attorney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaseHearResource;
use App\Http\Resources\CaseHearCollection;

class AttorneyCaseHearsController extends Controller
{
    public function index(
        Request $request,
        Attorney $attorney
    ): CaseHearCollection {
        $this->authorize('view', $attorney);

        $search = $request->get('search', '');

        $caseHears = $attorney
            ->caseHears()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaseHearCollection($caseHears);
    }

    public function store(
        Request $request,
        Attorney $attorney
    ): CaseHearResource {
        $this->authorize('create', CaseHear::class);

        $validated = $request->validate([
            'court_id' => ['required', 'exists:courts,id'],
            'judge_id' => ['required', 'exists:judges,id'],
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

        $caseHear = $attorney->caseHears()->create($validated);

        return new CaseHearResource($caseHear);
    }
}

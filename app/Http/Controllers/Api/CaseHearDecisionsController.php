<?php

namespace App\Http\Controllers\Api;

use App\Models\CaseHear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DecisionResource;
use App\Http\Resources\DecisionCollection;

class CaseHearDecisionsController extends Controller
{
    public function index(
        Request $request,
        CaseHear $caseHear
    ): DecisionCollection {
        $this->authorize('view', $caseHear);

        $search = $request->get('search', '');

        $decisions = $caseHear
            ->decisions()
            ->search($search)
            ->latest()
            ->paginate();

        return new DecisionCollection($decisions);
    }

    public function store(
        Request $request,
        CaseHear $caseHear
    ): DecisionResource {
        $this->authorize('create', Decision::class);

        $validated = $request->validate([
            'decisionDate' => ['required', 'date'],
            'Decisiontype' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
        ]);

        $decision = $caseHear->decisions()->create($validated);

        return new DecisionResource($decision);
    }
}

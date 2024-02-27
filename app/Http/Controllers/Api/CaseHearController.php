<?php

namespace App\Http\Controllers\Api;

use App\Models\CaseHear;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaseHearResource;
use App\Http\Resources\CaseHearCollection;
use App\Http\Requests\CaseHearStoreRequest;
use App\Http\Requests\CaseHearUpdateRequest;

class CaseHearController extends Controller
{
    public function index(Request $request): CaseHearCollection
    {
        $this->authorize('view-any', CaseHear::class);

        $search = $request->get('search', '');

        $caseHears = CaseHear::search($search)
            ->latest()
            ->paginate();

        return new CaseHearCollection($caseHears);
    }

    public function store(CaseHearStoreRequest $request): CaseHearResource
    {
        $this->authorize('create', CaseHear::class);

        $validated = $request->validated();

        $caseHear = CaseHear::create($validated);

        return new CaseHearResource($caseHear);
    }

    public function show(Request $request, CaseHear $caseHear): CaseHearResource
    {
        $this->authorize('view', $caseHear);

        return new CaseHearResource($caseHear);
    }

    public function update(
        CaseHearUpdateRequest $request,
        CaseHear $caseHear
    ): CaseHearResource {
        $this->authorize('update', $caseHear);

        $validated = $request->validated();

        $caseHear->update($validated);

        return new CaseHearResource($caseHear);
    }

    public function destroy(Request $request, CaseHear $caseHear): Response
    {
        $this->authorize('delete', $caseHear);

        $caseHear->delete();

        return response()->noContent();
    }
}

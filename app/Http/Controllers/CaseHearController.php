<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Judge;
use App\Models\CaseHear;
use App\Models\Attorney;
use App\Models\Wittness;
use Illuminate\View\View;
use App\Models\CaseCharge;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CaseHearStoreRequest;
use App\Http\Requests\CaseHearUpdateRequest;

class CaseHearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', CaseHear::class);

        $search = $request->get('search', '');

        $caseHears = CaseHear::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.case_hears.index', compact('caseHears', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', CaseHear::class);

        $courts = Court::pluck('name', 'id');
        $judges = Judge::pluck('name', 'id');
        $attorneys = Attorney::pluck('attorneyID', 'id');
        $caseCharges = CaseCharge::pluck('name', 'id');
        $wittnesses = Wittness::pluck('name', 'id');

        return view(
            'app.case_hears.create',
            compact(
                'courts',
                'judges',
                'attorneys',
                'caseCharges',
                'wittnesses'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CaseHearStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', CaseHear::class);

        $validated = $request->validated();

        $caseHear = CaseHear::create($validated);

        return redirect()
            ->route('case-hears.edit', $caseHear)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, CaseHear $caseHear): View
    {
        $this->authorize('view', $caseHear);

        return view('app.case_hears.show', compact('caseHear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, CaseHear $caseHear): View
    {
        $this->authorize('update', $caseHear);

        $courts = Court::pluck('name', 'id');
        $judges = Judge::pluck('name', 'id');
        $attorneys = Attorney::pluck('attorneyID', 'id');
        $caseCharges = CaseCharge::pluck('name', 'id');
        $wittnesses = Wittness::pluck('name', 'id');

        return view(
            'app.case_hears.edit',
            compact(
                'caseHear',
                'courts',
                'judges',
                'attorneys',
                'caseCharges',
                'wittnesses'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CaseHearUpdateRequest $request,
        CaseHear $caseHear
    ): RedirectResponse {
        $this->authorize('update', $caseHear);

        $validated = $request->validated();

        $caseHear->update($validated);

        return redirect()
            ->route('case-hears.edit', $caseHear)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        CaseHear $caseHear
    ): RedirectResponse {
        $this->authorize('delete', $caseHear);

        $caseHear->delete();

        return redirect()
            ->route('case-hears.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

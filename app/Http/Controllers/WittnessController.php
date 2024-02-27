<?php

namespace App\Http\Controllers;

use App\Models\Wittness;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\WittnessStoreRequest;
use App\Http\Requests\WittnessUpdateRequest;

class WittnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Wittness::class);

        $search = $request->get('search', '');

        $wittnesses = Wittness::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.wittnesses.index', compact('wittnesses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Wittness::class);

        return view('app.wittnesses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WittnessStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Wittness::class);

        $validated = $request->validated();

        $wittness = Wittness::create($validated);

        return redirect()
            ->route('wittnesses.edit', $wittness)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Wittness $wittness): View
    {
        $this->authorize('view', $wittness);

        return view('app.wittnesses.show', compact('wittness'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Wittness $wittness): View
    {
        $this->authorize('update', $wittness);

        return view('app.wittnesses.edit', compact('wittness'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        WittnessUpdateRequest $request,
        Wittness $wittness
    ): RedirectResponse {
        $this->authorize('update', $wittness);

        $validated = $request->validated();

        $wittness->update($validated);

        return redirect()
            ->route('wittnesses.edit', $wittness)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Wittness $wittness
    ): RedirectResponse {
        $this->authorize('delete', $wittness);

        $wittness->delete();

        return redirect()
            ->route('wittnesses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}

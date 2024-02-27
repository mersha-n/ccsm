<?php

namespace App\Http\Controllers\Api;

use App\Models\Wittness;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\WittnessResource;
use App\Http\Resources\WittnessCollection;
use App\Http\Requests\WittnessStoreRequest;
use App\Http\Requests\WittnessUpdateRequest;

class WittnessController extends Controller
{
    public function index(Request $request): WittnessCollection
    {
        $this->authorize('view-any', Wittness::class);

        $search = $request->get('search', '');

        $wittnesses = Wittness::search($search)
            ->latest()
            ->paginate();

        return new WittnessCollection($wittnesses);
    }

    public function store(WittnessStoreRequest $request): WittnessResource
    {
        $this->authorize('create', Wittness::class);

        $validated = $request->validated();

        $wittness = Wittness::create($validated);

        return new WittnessResource($wittness);
    }

    public function show(Request $request, Wittness $wittness): WittnessResource
    {
        $this->authorize('view', $wittness);

        return new WittnessResource($wittness);
    }

    public function update(
        WittnessUpdateRequest $request,
        Wittness $wittness
    ): WittnessResource {
        $this->authorize('update', $wittness);

        $validated = $request->validated();

        $wittness->update($validated);

        return new WittnessResource($wittness);
    }

    public function destroy(Request $request, Wittness $wittness): Response
    {
        $this->authorize('delete', $wittness);

        $wittness->delete();

        return response()->noContent();
    }
}

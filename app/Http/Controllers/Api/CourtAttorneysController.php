<?php

namespace App\Http\Controllers\Api;

use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttorneyResource;
use App\Http\Resources\AttorneyCollection;

class CourtAttorneysController extends Controller
{
    public function index(Request $request, Court $court): AttorneyCollection
    {
        $this->authorize('view', $court);

        $search = $request->get('search', '');

        $attorneys = $court
            ->attorneys()
            ->search($search)
            ->latest()
            ->paginate();

        return new AttorneyCollection($attorneys);
    }

    public function store(Request $request, Court $court): AttorneyResource
    {
        $this->authorize('create', Attorney::class);

        $validated = $request->validate([
            'attorneyID' => ['required', 'max:255', 'string'],
            'Name' => ['required', 'max:255', 'string'],
            'Address' => ['required', 'max:255', 'string'],
            'State' => ['required', 'max:255', 'string'],
            'courtType' => ['required', 'max:255', 'string'],
            'EmpType' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        $attorney = $court->attorneys()->create($validated);

        return new AttorneyResource($attorney);
    }
}

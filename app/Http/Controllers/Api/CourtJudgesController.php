<?php

namespace App\Http\Controllers\Api;

use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JudgeResource;
use App\Http\Resources\JudgeCollection;

class CourtJudgesController extends Controller
{
    public function index(Request $request, Court $court): JudgeCollection
    {
        $this->authorize('view', $court);

        $search = $request->get('search', '');

        $judges = $court
            ->judges()
            ->search($search)
            ->latest()
            ->paginate();

        return new JudgeCollection($judges);
    }

    public function store(Request $request, Court $court): JudgeResource
    {
        $this->authorize('create', Judge::class);

        $validated = $request->validate([
            'judgeID' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'Address' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'courtTyep' => ['required', 'max:255', 'string'],
            'Emptype' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        $judge = $court->judges()->create($validated);

        return new JudgeResource($judge);
    }
}

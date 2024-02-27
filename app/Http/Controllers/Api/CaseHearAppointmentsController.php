<?php

namespace App\Http\Controllers\Api;

use App\Models\CaseHear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class CaseHearAppointmentsController extends Controller
{
    public function index(
        Request $request,
        CaseHear $caseHear
    ): AppointmentCollection {
        $this->authorize('view', $caseHear);

        $search = $request->get('search', '');

        $appointments = $caseHear
            ->appointments()
            ->search($search)
            ->latest()
            ->paginate();

        return new AppointmentCollection($appointments);
    }

    public function store(
        Request $request,
        CaseHear $caseHear
    ): AppointmentResource {
        $this->authorize('create', Appointment::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'Description' => ['required', 'max:255', 'string'],
        ]);

        $appointment = $caseHear->appointments()->create($validated);

        return new AppointmentResource($appointment);
    }
}

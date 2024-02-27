@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('case-hears.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.case_hears.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.court_id')</h5>
                    <span>{{ optional($caseHear->court)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.judge_id')</h5>
                    <span>{{ optional($caseHear->judge)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.attorney_id')</h5>
                    <span
                        >{{ optional($caseHear->attorney)->attorneyID ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.case_charge_id')</h5>
                    <span
                        >{{ optional($caseHear->caseCharge)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.wittness_id')</h5>
                    <span
                        >{{ optional($caseHear->wittness)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.CaseID')</h5>
                    <span>{{ $caseHear->CaseID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.casename')</h5>
                    <span>{{ $caseHear->casename ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.fileNumber')</h5>
                    <span>{{ $caseHear->fileNumber ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.address')</h5>
                    <span>{{ $caseHear->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.state')</h5>
                    <span>{{ $caseHear->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.location')</h5>
                    <span>{{ $caseHear->location ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.caseStartDate')</h5>
                    <span>{{ $caseHear->caseStartDate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_hears.inputs.description')</h5>
                    <span>{{ $caseHear->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('case-hears.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\CaseHear::class)
                <a
                    href="{{ route('case-hears.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

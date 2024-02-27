@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('case-charges.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.case_charges.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.deptName')</h5>
                    <span>{{ $caseCharge->deptName ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.mid')</h5>
                    <span>{{ $caseCharge->mid ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.rank')</h5>
                    <span>{{ $caseCharge->rank ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.name')</h5>
                    <span>{{ $caseCharge->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.address')</h5>
                    <span>{{ $caseCharge->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.state')</h5>
                    <span>{{ $caseCharge->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.crimeDescription')</h5>
                    <span>{{ $caseCharge->crimeDescription ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.crimeDate')</h5>
                    <span>{{ $caseCharge->crimeDate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.case_charges.inputs.ChargeDate')</h5>
                    <span>{{ $caseCharge->ChargeDate ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('case-charges.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\CaseCharge::class)
                <a
                    href="{{ route('case-charges.create') }}"
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

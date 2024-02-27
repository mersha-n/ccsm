@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('decisions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.decisions.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.decisions.inputs.case_hear_id')</h5>
                    <span
                        >{{ optional($decision->caseHear)->CaseID ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.decisions.inputs.decisionDate')</h5>
                    <span>{{ $decision->decisionDate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.decisions.inputs.Decisiontype')</h5>
                    <span>{{ $decision->Decisiontype ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.decisions.inputs.Description')</h5>
                    <span>{{ $decision->Description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('decisions.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Decision::class)
                <a href="{{ route('decisions.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

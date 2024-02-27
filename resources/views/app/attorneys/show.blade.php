@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('attorneys.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.attorneys.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.court_id')</h5>
                    <span>{{ optional($attorney->court)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.attorneyID')</h5>
                    <span>{{ $attorney->attorneyID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.Name')</h5>
                    <span>{{ $attorney->Name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.Address')</h5>
                    <span>{{ $attorney->Address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.State')</h5>
                    <span>{{ $attorney->State ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.courtType')</h5>
                    <span>{{ $attorney->courtType ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.EmpType')</h5>
                    <span>{{ $attorney->EmpType ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.attorneys.inputs.description')</h5>
                    <span>{{ $attorney->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('attorneys.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Attorney::class)
                <a href="{{ route('attorneys.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

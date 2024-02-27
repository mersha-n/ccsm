@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('judges.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.judges.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.court_id')</h5>
                    <span>{{ optional($judge->court)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.judgeID')</h5>
                    <span>{{ $judge->judgeID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.name')</h5>
                    <span>{{ $judge->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.Address')</h5>
                    <span>{{ $judge->Address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.state')</h5>
                    <span>{{ $judge->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.courtTyep')</h5>
                    <span>{{ $judge->courtTyep ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.Emptype')</h5>
                    <span>{{ $judge->Emptype ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.judges.inputs.description')</h5>
                    <span>{{ $judge->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('judges.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Judge::class)
                <a href="{{ route('judges.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

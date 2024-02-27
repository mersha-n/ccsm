@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('courts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.courts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.courts.inputs.courtID')</h5>
                    <span>{{ $court->courtID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courts.inputs.name')</h5>
                    <span>{{ $court->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courts.inputs.courtType')</h5>
                    <span>{{ $court->courtType ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courts.inputs.speciality')</h5>
                    <span>{{ $court->speciality ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courts.inputs.description')</h5>
                    <span>{{ $court->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('courts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Court::class)
                <a href="{{ route('courts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Attorney::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Attorneys</h4>

            <livewire:court-attorneys-detail :court="$court" />
        </div>
    </div>
    @endcan
</div>
@endsection

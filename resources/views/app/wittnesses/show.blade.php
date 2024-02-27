@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('wittnesses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.wittnesses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.wittnessID')</h5>
                    <span>{{ $wittness->wittnessID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.name')</h5>
                    <span>{{ $wittness->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.address')</h5>
                    <span>{{ $wittness->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.state')</h5>
                    <span>{{ $wittness->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.wittnessType')</h5>
                    <span>{{ $wittness->wittnessType ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.wittnesses.inputs.description')</h5>
                    <span>{{ $wittness->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('wittnesses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Wittness::class)
                <a
                    href="{{ route('wittnesses.create') }}"
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

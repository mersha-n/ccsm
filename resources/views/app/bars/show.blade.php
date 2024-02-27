@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bars.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bars.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bars.inputs.court_id')</h5>
                    <span>{{ optional($bar->court)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bars.inputs.address')</h5>
                    <span>{{ $bar->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bars.inputs.state')</h5>
                    <span>{{ $bar->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bars.inputs.location')</h5>
                    <span>{{ $bar->location ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bars.inputs.description')</h5>
                    <span>{{ $bar->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('bars.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Bar::class)
                <a href="{{ route('bars.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

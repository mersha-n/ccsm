@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('courts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.courts.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('courts.update', $court) }}"
                class="mt-4"
            >
                @include('app.courts.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('courts.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('courts.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>

    @can('view-any', App\Models\Attorney::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Attorneys</h4>

            <livewire:court-attorneys-detail :court="$court" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\Judge::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Judges</h4>

            <livewire:court-judges-detail :court="$court" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\Bar::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Bars</h4>

            <livewire:court-bars-detail :court="$court" />
        </div>
    </div>
    @endcan
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Attorney::class)
                <a
                    href="{{ route('attorneys.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                            {{ __('courtID') }}
                            </th>
                            <th class="text-left">
                            {{ __('attorneyID') }}
                            </th>
                            <th class="text-left">
                            {{ __('name') }}
                            </th>
                            <th class="text-left">
                            {{ __('address') }}
                            </th>
                            <th class="text-left">
                            {{ __('state') }}
                            </th>
                            <th class="text-left">
                            {{ __('courtType') }}
                            </th>
                            <th class="text-left">
                            {{ __('Employeetype') }}
                            </th>
                            <th class="text-left">
                            {{ __('description') }}
                            </th>
                            <th class="text-center">
                            {{ __('action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attorneys as $attorney)
                        <tr>
                            <td>
                                {{ optional($attorney->court)->name ?? '-' }}
                            </td>
                            <td>{{ $attorney->attorneyID ?? '-' }}</td>
                            <td>{{ $attorney->Name ?? '-' }}</td>
                            <td>{{ $attorney->Address ?? '-' }}</td>
                            <td>{{ $attorney->State ?? '-' }}</td>
                            <td>{{ $attorney->courtType ?? '-' }}</td>
                            <td>{{ $attorney->EmpType ?? '-' }}</td>
                            <td>{{ $attorney->description ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $attorney)
                                    <a
                                        href="{{ route('attorneys.edit', $attorney) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $attorney)
                                    <a
                                        href="{{ route('attorneys.show', $attorney) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $attorney)
                                    <form
                                        action="{{ route('attorneys.destroy', $attorney) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $attorneys->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

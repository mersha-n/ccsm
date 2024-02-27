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
                @can('create', App\Models\CaseHear::class)
                <a
                    href="{{ route('case-hears.create') }}"
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
                                @lang('courtID')
                            </th>
                            <th class="text-left">
                                @lang('judgeID')
                            </th>
                            <th class="text-left">
                                @lang('attorneyID')
                            </th>
                            <th class="text-left">
                                @lang('charge_id')
                            </th>
                            <th class="text-left">
                                @lang('wittness_id')
                            </th>
                            <th class="text-left">
                                @lang('CaseID')
                            </th>
                            <th class="text-left">
                                @lang('casename')
                            </th>
                            <th class="text-left">
                                @lang('fileNumber')
                            </th>
                            <th class="text-left">
                                @lang('address')
                            </th>
                            <th class="text-left">
                                @lang('state')
                            </th>
                            <th class="text-left">
                                @lang('location')
                            </th>
                            <th class="text-left">
                                @lang('caseStartDate')
                            </th>
                            <th class="text-left">
                                @lang('description')
                            </th>
                            <th class="text-center">
                                @lang('actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($caseHears as $caseHear)
                        <tr>
                            <td>
                                {{ optional($caseHear->court)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($caseHear->judge)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($caseHear->attorney)->attorneyID ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($caseHear->caseCharge)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($caseHear->wittness)->name ?? '-' }}
                            </td>
                            <td>{{ $caseHear->CaseID ?? '-' }}</td>
                            <td>{{ $caseHear->casename ?? '-' }}</td>
                            <td>{{ $caseHear->fileNumber ?? '-' }}</td>
                            <td>{{ $caseHear->address ?? '-' }}</td>
                            <td>{{ $caseHear->state ?? '-' }}</td>
                            <td>{{ $caseHear->location ?? '-' }}</td>
                            <td>{{ $caseHear->caseStartDate ?? '-' }}</td>
                            <td>{{ $caseHear->description ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $caseHear)
                                    <a
                                        href="{{ route('case-hears.edit', $caseHear) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $caseHear)
                                    <a
                                        href="{{ route('case-hears.show', $caseHear) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $caseHear)
                                    <form
                                        action="{{ route('case-hears.destroy', $caseHear) }}"
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
                            <td colspan="14">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="14">{!! $caseHears->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

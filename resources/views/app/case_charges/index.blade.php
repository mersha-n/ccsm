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
                @can('create', App\Models\CaseCharge::class)
                <a
                    href="{{ route('case-charges.create') }}"
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
                <h4 class="card-title">
                    @lang('title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('deptName')
                            </th>
                            <th class="text-left">
                                @lang('mid')
                            </th>
                            <th class="text-left">
                                @lang('rank')
                            </th>
                            <th class="text-left">
                                @lang('name')
                            </th>
                            <th class="text-left">
                                @lang('address')
                            </th>
                            <th class="text-left">
                                @lang('state')
                            </th>
                            <th class="text-left">
                                @lang('crimeDescription')
                            </th>
                            <th class="text-left">
                                @lang('crimeDate')
                            </th>
                            <th class="text-left">
                                @lang('ChargeDate')
                            </th>
                            <th class="text-center">
                                @lang('actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($caseCharges as $caseCharge)
                        <tr>
                            <td>{{ $caseCharge->deptName ?? '-' }}</td>
                            <td>{{ $caseCharge->mid ?? '-' }}</td>
                            <td>{{ $caseCharge->rank ?? '-' }}</td>
                            <td>{{ $caseCharge->name ?? '-' }}</td>
                            <td>{{ $caseCharge->address ?? '-' }}</td>
                            <td>{{ $caseCharge->state ?? '-' }}</td>
                            <td>{{ $caseCharge->crimeDescription ?? '-' }}</td>
                            <td>{{ $caseCharge->crimeDate ?? '-' }}</td>
                            <td>{{ $caseCharge->ChargeDate ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $caseCharge)
                                    <a
                                        href="{{ route('case-charges.edit', $caseCharge) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $caseCharge)
                                    <a
                                        href="{{ route('case-charges.show', $caseCharge) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $caseCharge)
                                    <form
                                        action="{{ route('case-charges.destroy', $caseCharge) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $caseCharges->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

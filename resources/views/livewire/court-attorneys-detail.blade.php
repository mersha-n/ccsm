<div>
    <div class="mb-4">
        @can('create', App\Models\Attorney::class)
        <button class="btn btn-primary" wire:click="newAttorney">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Attorney::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="court-attorneys-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.attorneyID"
                            label="Attorney Id"
                            wire:model="attorney.attorneyID"
                            maxlength="255"
                            placeholder="Attorney Id"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.Name"
                            label="Name"
                            wire:model="attorney.Name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.courtType"
                            label="Court Type"
                            wire:model="attorney.courtType"
                            maxlength="255"
                            placeholder="Court Type"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.Address"
                            label="Address"
                            wire:model="attorney.Address"
                            maxlength="255"
                            placeholder="Address"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.State"
                            label="State"
                            wire:model="attorney.State"
                            maxlength="255"
                            placeholder="State"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="attorney.EmpType"
                            label="Emp Type"
                            wire:model="attorney.EmpType"
                            maxlength="255"
                            placeholder="Emp Type"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="attorney.description"
                            label="Description"
                            wire:model="attorney.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.attorneyID')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.Name')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.courtType')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.Address')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.State')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.EmpType')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_attorneys.inputs.description')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($attorneys as $attorney)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $attorney->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $attorney->attorneyID ?? '-' }}
                    </td>
                    <td class="text-left">{{ $attorney->Name ?? '-' }}</td>
                    <td class="text-left">{{ $attorney->courtType ?? '-' }}</td>
                    <td class="text-left">{{ $attorney->Address ?? '-' }}</td>
                    <td class="text-left">{{ $attorney->State ?? '-' }}</td>
                    <td class="text-left">{{ $attorney->EmpType ?? '-' }}</td>
                    <td class="text-left">
                        {{ $attorney->description ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $attorney)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editAttorney({{ $attorney->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">{{ $attorneys->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

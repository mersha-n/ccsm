<div>
    <div class="mb-4">
        @can('create', App\Models\Bar::class)
        <button class="btn btn-primary" wire:click="newBar">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Bar::class)
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

    <x-modal id="court-bars-modal" wire:model="showingModal">
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
                            name="bar.address"
                            label="Address"
                            wire:model="bar.address"
                            maxlength="255"
                            placeholder="Address"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="bar.state"
                            label="State"
                            wire:model="bar.state"
                            maxlength="255"
                            placeholder="State"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="bar.location"
                            label="Location"
                            wire:model="bar.location"
                            maxlength="255"
                            placeholder="Location"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="bar.description"
                            label="Description"
                            wire:model="bar.description"
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
                        @lang('crud.court_bars.inputs.address')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_bars.inputs.state')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_bars.inputs.location')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_bars.inputs.description')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($bars as $bar)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $bar->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $bar->address ?? '-' }}</td>
                    <td class="text-left">{{ $bar->state ?? '-' }}</td>
                    <td class="text-left">{{ $bar->location ?? '-' }}</td>
                    <td class="text-left">{{ $bar->description ?? '-' }}</td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $bar)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editBar({{ $bar->id }})"
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
                    <td colspan="5">{{ $bars->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

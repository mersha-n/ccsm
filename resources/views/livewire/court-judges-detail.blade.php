<div>
    <div class="mb-4">
        @can('create', App\Models\Judge::class)
        <button class="btn btn-primary" wire:click="newJudge">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Judge::class)
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

    <x-modal id="court-judges-modal" wire:model="showingModal">
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
                            name="judge.judgeID"
                            label="Judge Id"
                            wire:model="judge.judgeID"
                            maxlength="255"
                            placeholder="Judge Id"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="judge.name"
                            label="Name"
                            wire:model="judge.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="judge.courtTyep"
                            label="Court Tyep"
                            wire:model="judge.courtTyep"
                            maxlength="255"
                            placeholder="Court Tyep"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="judge.Address"
                            label="Address"
                            wire:model="judge.Address"
                            maxlength="255"
                            placeholder="Address"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="judge.state"
                            label="State"
                            wire:model="judge.state"
                            maxlength="255"
                            placeholder="State"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="judge.Emptype"
                            label="Emptype"
                            wire:model="judge.Emptype"
                            maxlength="255"
                            placeholder="Emptype"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="judge.description"
                            label="Description"
                            wire:model="judge.description"
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
                        @lang('crud.court_judges.inputs.judgeID')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.courtTyep')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.Address')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.state')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.Emptype')
                    </th>
                    <th class="text-left">
                        @lang('crud.court_judges.inputs.description')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($judges as $judge)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $judge->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $judge->judgeID ?? '-' }}</td>
                    <td class="text-left">{{ $judge->name ?? '-' }}</td>
                    <td class="text-left">{{ $judge->courtTyep ?? '-' }}</td>
                    <td class="text-left">{{ $judge->Address ?? '-' }}</td>
                    <td class="text-left">{{ $judge->state ?? '-' }}</td>
                    <td class="text-left">{{ $judge->Emptype ?? '-' }}</td>
                    <td class="text-left">{{ $judge->description ?? '-' }}</td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $judge)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editJudge({{ $judge->id }})"
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
                    <td colspan="8">{{ $judges->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

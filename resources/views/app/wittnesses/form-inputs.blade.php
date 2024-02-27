@php $editing = isset($wittness) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="wittnessID"
            label="Wittness Id"
            :value="old('wittnessID', ($editing ? $wittness->wittnessID : ''))"
            maxlength="255"
            placeholder="Wittness Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $wittness->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $wittness->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $wittness->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="wittnessType" label="Wittness Type">
            @php $selected = old('wittnessType', ($editing ? $wittness->wittnessType : '')) @endphp
            <option value="Attorney" {{ $selected == 'Attorney' ? 'selected' : '' }} >Attorney</option>
            <option value="Accused" {{ $selected == 'Accused' ? 'selected' : '' }} >Accused</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $wittness->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

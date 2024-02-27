@php $editing = isset($judge) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="court_id" label="Court" required>
            @php $selected = old('court_id', ($editing ? $judge->court_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Court</option>
            @foreach($courts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="judgeID"
            label="Judge Id"
            :value="old('judgeID', ($editing ? $judge->judgeID : ''))"
            maxlength="255"
            placeholder="Judge Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $judge->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="Address"
            label="Address"
            :value="old('Address', ($editing ? $judge->Address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $judge->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="courtTyep" label="Court Tyep">
            @php $selected = old('courtTyep', ($editing ? $judge->courtTyep : '')) @endphp
            <option value="Higher" {{ $selected == 'Higher' ? 'selected' : '' }} >Higher</option>
            <option value="Lawyer" {{ $selected == 'Lawyer' ? 'selected' : '' }} >Lawyer</option>
            <option value="Attorney" {{ $selected == 'Attorney' ? 'selected' : '' }} >Attorney</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="Emptype" label="Emptype">
            @php $selected = old('Emptype', ($editing ? $judge->Emptype : '')) @endphp
            <option value="Solder" {{ $selected == 'Solder' ? 'selected' : '' }} >Solder</option>
            <option value="Civil" {{ $selected == 'Civil' ? 'selected' : '' }} >Civil</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $judge->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

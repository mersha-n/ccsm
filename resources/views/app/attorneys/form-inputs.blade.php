@php $editing = isset($attorney) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="court_id" label="Court" required>
            @php $selected = old('court_id', ($editing ? $attorney->court_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Court</option>
            @foreach($courts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="attorneyID"
            label="Attorney Id"
            :value="old('attorneyID', ($editing ? $attorney->attorneyID : ''))"
            maxlength="255"
            placeholder="Attorney Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="Name"
            label="Name"
            :value="old('Name', ($editing ? $attorney->Name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="Address"
            label="Address"
            :value="old('Address', ($editing ? $attorney->Address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="State"
            label="State"
            :value="old('State', ($editing ? $attorney->State : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="courtType" label="Court Type">
            @php $selected = old('courtType', ($editing ? $attorney->courtType : '')) @endphp
            <option value="Higher" {{ $selected == 'Higher' ? 'selected' : '' }} >Higher</option>
            <option value="First" {{ $selected == 'First' ? 'selected' : '' }} >First</option>
            <option value="Second" {{ $selected == 'Second' ? 'selected' : '' }} >Second</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="EmpType" label="Emp Type">
            @php $selected = old('EmpType', ($editing ? $attorney->EmpType : '')) @endphp
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
            >{{ old('description', ($editing ? $attorney->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

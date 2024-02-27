@php $editing = isset($court) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="courtID"
            label="Court Id"
            :value="old('courtID', ($editing ? $court->courtID : ''))"
            maxlength="255"
            placeholder="Court Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $court->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="courtType" label="Court Type">
            @php $selected = old('courtType', ($editing ? $court->courtType : '')) @endphp
            <option value="Higher" {{ $selected == 'Higher' ? 'selected' : '' }} >Higher</option>
            <option value="First" {{ $selected == 'First' ? 'selected' : '' }} >First</option>
            <option value="Second" {{ $selected == 'Second' ? 'selected' : '' }} >Second</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="speciality" label="Speciality">
            @php $selected = old('speciality', ($editing ? $court->speciality : '')) @endphp
            <option value="Judge" {{ $selected == 'Judge' ? 'selected' : '' }} >Judge</option>
            <option value="Lawyer" {{ $selected == 'Lawyer' ? 'selected' : '' }} >Lawyer</option>
            <option value="Attorney" {{ $selected == 'Attorney' ? 'selected' : '' }} >Attorney</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $court->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

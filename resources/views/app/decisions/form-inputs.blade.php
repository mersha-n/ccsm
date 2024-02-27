@php $editing = isset($decision) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="case_hear_id" label="Case Hear" required>
            @php $selected = old('case_hear_id', ($editing ? $decision->case_hear_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Case Hear</option>
            @foreach($caseHears as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.datetime
            name="decisionDate"
            label="Decision Date"
            value="{{ old('decisionDate', ($editing ? optional($decision->decisionDate)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="Decisiontype"
            label="Decisiontype"
            :value="old('Decisiontype', ($editing ? $decision->Decisiontype : ''))"
            maxlength="255"
            placeholder="Decisiontype"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="Description"
            label="Description"
            maxlength="255"
            required
            >{{ old('Description', ($editing ? $decision->Description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

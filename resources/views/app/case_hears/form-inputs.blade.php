@php $editing = isset($caseHear) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="court_id" label="Court" required>
            @php $selected = old('court_id', ($editing ? $caseHear->court_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Court</option>
            @foreach($courts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="judge_id" label="Judge" required>
            @php $selected = old('judge_id', ($editing ? $caseHear->judge_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Judge</option>
            @foreach($judges as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="attorney_id" label="Attorney" required>
            @php $selected = old('attorney_id', ($editing ? $caseHear->attorney_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Attorney</option>
            @foreach($attorneys as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="case_charge_id" label="Case Charge" required>
            @php $selected = old('case_charge_id', ($editing ? $caseHear->case_charge_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Case Charge</option>
            @foreach($caseCharges as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="wittness_id" label="Wittness" required>
            @php $selected = old('wittness_id', ($editing ? $caseHear->wittness_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Wittness</option>
            @foreach($wittnesses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="CaseID"
            label="Case Id"
            :value="old('CaseID', ($editing ? $caseHear->CaseID : ''))"
            maxlength="255"
            placeholder="Case Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="casename"
            label="Casename"
            :value="old('casename', ($editing ? $caseHear->casename : ''))"
            maxlength="255"
            placeholder="Casename"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="fileNumber"
            label="File Number"
            :value="old('fileNumber', ($editing ? $caseHear->fileNumber : ''))"
            maxlength="255"
            placeholder="File Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $caseHear->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $caseHear->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="location"
            label="Location"
            :value="old('location', ($editing ? $caseHear->location : ''))"
            maxlength="255"
            placeholder="Location"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.datetime
            name="caseStartDate"
            label="Case Start Date"
            value="{{ old('caseStartDate', ($editing ? optional($caseHear->caseStartDate)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $caseHear->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

@php $editing = isset($caseCharge) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="deptName"
            label="Dept Name"
            :value="old('deptName', ($editing ? $caseCharge->deptName : ''))"
            maxlength="255"
            placeholder="Dept Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="mid"
            label="Mid"
            :value="old('mid', ($editing ? $caseCharge->mid : ''))"
            maxlength="255"
            placeholder="Mid"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="rank"
            label="Rank"
            :value="old('rank', ($editing ? $caseCharge->rank : ''))"
            maxlength="255"
            placeholder="Rank"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $caseCharge->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $caseCharge->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="state"
            label="State"
            :value="old('state', ($editing ? $caseCharge->state : ''))"
            maxlength="255"
            placeholder="State"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.textarea
            name="crimeDescription"
            label="Crime Description"
            maxlength="255"
            required
            >{{ old('crimeDescription', ($editing ?
            $caseCharge->crimeDescription : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.datetime
            name="crimeDate"
            label="Crime Date"
            value="{{ old('crimeDate', ($editing ? optional($caseCharge->crimeDate)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.datetime
            name="ChargeDate"
            label="Charge Date"
            value="{{ old('ChargeDate', ($editing ? optional($caseCharge->ChargeDate)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>
</div>

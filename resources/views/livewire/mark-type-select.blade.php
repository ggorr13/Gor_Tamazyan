<div class="{{ $class }}">
    <div class="w-full">
        <x-forms.select name="mark_id" :label="__('Mark')" wire:model="selectedMark">
            @foreach($markOptions as $mark)
                <x-forms.option name="mark_id" :value="$mark->id">{{ $mark->name }}</x-forms.option>
            @endforeach
        </x-forms.select>
    </div>
    <div class="w-full">
        <x-forms.select name="type_id" :label="__('Type')" wire:model.defer="selectedType">
            <option disabled selected>Select type</option>
            @foreach($this->typeOptions as $type)
                <x-forms.option name="type_id" :value="$type->id">{{ $type->name }}</x-forms.option>
            @endforeach
        </x-forms.select>
    </div>
</div>

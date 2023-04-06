<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-forms.provider :action="route('type.update', $type->id)" method="put">
                        <div>
                            <x-forms.input name="name" :value="$type->name"/>
                        </div>
                        <div>
                            <x-forms.select name="mark_id" :label="__('Mark')" :value="$type->mark_id">
                                @foreach($marks as $mark)
                                    <x-forms.option name="mark_id" :value="$mark->id" :selected="$type->mark_id">{{ $mark->name }}</x-forms.option>
                                @endforeach
                            </x-forms.select>
                        </div>
                        <div class="flex justify-end">
                            <button class="bg-indigo-400 text-white py-2 px-4 rounded">
                                Save
                            </button>
                        </div>
                    </x-forms.provider>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

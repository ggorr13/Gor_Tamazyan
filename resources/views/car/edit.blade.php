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
                    <x-forms.provider :action="route('car.update', $car->id)" method="put" enctype="multipart/form-data">
                        <div>
                            <img src="{{asset($car->image)}}" width="100">
                            <x-forms.input name="image" type="file"/>
                        </div>
                        <div>
                            <x-forms.textarea name="description" value="{{$car->description}}"></x-forms.textarea>
                        </div>
                        <div>
                            <livewire:mark-type-select :selectedType="$car->type_id" :selectedMark="$car->mark_id" class="space-y-6" />
                        </div>
                        <div>
                            <x-forms.checkbox name="published" :value="$car->published"/>
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

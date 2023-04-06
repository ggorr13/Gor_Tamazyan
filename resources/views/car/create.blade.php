<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Car') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-forms.provider route="car.store" method="post" enctype="multipart/form-data">
                        <div>
                            <x-forms.input name="image" type="file"/>
                        </div>
                        <div>
                            <x-forms.textarea name="description"/>
                        </div>
                        <div>
                            <livewire:mark-type-select class="space-y-6" />
                        </div>
                        <div>
                           <x-forms.checkbox name="published"/>
                        </div>
                        <div class="flex justify-end">
                            <button class="bg-indigo-400 text-white py-2 px-4 rounded">
                                Create
                            </button>
                        </div>
                    </x-forms.provider>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

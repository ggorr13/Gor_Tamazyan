<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marks') }}
        </h2>
        <a href="{{ route('mark.create') }}" class="bg-indigo-400 text-white py-2 px-4 rounded ml-auto">
            {{ __('Create') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" x-data="{ id: -1 }">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4 text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($marks as $index => $mark)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    {{ ($marks->currentPage() - 1) * $marks->perPage() + $index + 1}}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $mark->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-end">
                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('mark.edit', $mark->id) }}"
                                           class="bg-indigo-400 text-white py-2 px-4 rounded">
                                            {{  __('Edit') }}
                                        </a>

                                        <button class="bg-red-400 text-white py-2 px-4 rounded"
                                                x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'mark-deletion');id = @js($mark->id)">
                                            {{  __('Delete') }}
                                        </button>
                                    </div>
                                    <x-forms.provider id="mark-destroy-{{ $mark->id }}"
                                                      :action="route('mark.destroy', $mark->id)" method="delete"/>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{ $marks->links() }}
                    </div>

                    <x-modal name="mark-deletion" focusable>
                        <div class="p-8 space-y-6">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete Mark?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once your Mark is deleted, all of its resources and data will be permanently deleted.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button x-on:click="document.getElementById(`mark-destroy-${id}`).submit()"
                                                 class="ml-3">
                                    {{ __('Delete Mark') }}
                                </x-danger-button>
                            </div>
                        </div>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

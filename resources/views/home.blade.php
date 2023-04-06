<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test task</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form class="space-x-6 flex items-end" action="{{route('home.index')}}">
            <livewire:mark-type-select class="flex justify-center w-full space-x-6"/>
            <button type="submit"  class="bg-indigo-400 text-white py-2 px-4 rounded ml-auto h-fit" >Search</button>
        </form>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900" x-data="{ id: -1 }">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Image</th>
                        <th scope="col" class="px-6 py-4">Mark</th>
                        <th scope="col" class="px-6 py-4">Type</th>
                        <th scope="col" class="px-6 py-4">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $index => $car)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                {{ ($cars->currentPage() - 1) * $cars->perPage() + $index + 1}}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <img src="{{asset($car->image)}}" width="100" />
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $car->type->mark->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $car->type->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $car->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $cars->links() }}
                </div>

                <x-modal name="car-deletion" focusable>
                    <div class="p-8 space-y-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete Car?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your Car is deleted, all of its resources and data will be permanently deleted.') }}
                        </p>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button x-on:click="document.getElementById(`car-destroy-${id}`).submit()"
                                             class="ml-3">
                                {{ __('Delete Car') }}
                            </x-danger-button>
                        </div>
                    </div>
                </x-modal>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>

@props([
    'disabled' => false,
    'type' => 'text',
    'name' => '',
    'id' => $name ?? '',
    'value' => isset($name) && isset($type) && $type === 'password' ? '' : old($name),
])

@php
    $class = 'block mt-1 w-full border-gray-300 rounded-md shadow-sm '.
        'dark:border-gray-800 dark:text-gray-300 dark:bg-gray-900/50 '.
        'focus:border-indigo-500 focus:ring-indigo-500 '.
        'disabled:cursor-not-allowed disabled:selection:bg-transparent disabled:selection:text-black '.
        'disabled:selection:dark:text-gray-300 disabled:selection:dark:text-black';
@endphp

<input
    {{ $attributes->merge(compact('class', 'disabled')) }}
    @if(!$disabled) name="{{ $name }}" @endif
    type="{{ $type }}"
    id="{{ $id }}"
    value="{{ $type === 'password' ? $value : old($name, $value) }}"
/>
@if($disabled)
    <input type="hidden" name="{{ $name }}" value="{{ $value }}" />
@endif

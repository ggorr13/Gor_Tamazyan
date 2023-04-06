@props([
 'disabled' => false,
 'name' => '',
 'feedback' => $errors,
 'id' => $name ?? '',
 'label' => $name ?? '',
 'value' => isset($name) ? old($name) : ''
])

@php
    $class = 'block mt-1 w-full border-gray-300 rounded-md shadow-sm '.
        'dark:border-gray-800 dark:text-gray-300 dark:bg-gray-900/50 '.
        'focus:border-indigo-500 focus:ring-indigo-500 '.
        'disabled:cursor-not-allowed disabled:selection:bg-transparent disabled:selection:text-black '.
        'disabled:selection:dark:text-gray-300 disabled:selection:dark:text-black';
@endphp

<x-forms.input.label :for="$id" :value="$label"/>

<textarea {{ $attributes->merge(compact('disabled', 'class')) }} name="{{  $name }}" id="{{  $id }}">{{ $value }}</textarea>

<x-forms.input.error :name="$name" :feedback="$feedback"/>

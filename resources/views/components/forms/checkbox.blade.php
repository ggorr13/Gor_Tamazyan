@props([
    'name' => '',
    'id' => $name ?? '',
    'type' => 'checkbox',
    'label' => $name ?? '',
    'value' => isset($name) && isset($type) && $type === 'password' ? '' : old($name),
])

<label for="{{ $id }}" class="inline-flex items-center">
    <input id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" @if($value) checked @endif class="rounded border-gray-300 dark:border-gray-800 text-indigo-600 shadow-sm focus:ring-indigo-500">
    <span class="select-none ml-2 text-sm text-gray-600">{{ $label }}</span>
</label>

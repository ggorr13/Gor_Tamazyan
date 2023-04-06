@props(['disabled' => false, 'name' => '',  'value' => '', 'selected'])

@php
    if(old($name)) {
        $selected = old($name) == $value;
    }

    else if(isset($selected) && $selected !== true) {
        $selected = $selected == $value;
    }

    $selected ??= false
@endphp

<option {{ $attributes }} @if($selected) selected @endif value="{{ $value }}" >{{ $slot }}</option>

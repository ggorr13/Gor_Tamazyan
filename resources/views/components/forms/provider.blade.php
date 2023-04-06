@props(['route', 'method' => 'get', 'action' => isset($route) ? route($route) : '#'])

<form
    {{ $attributes->merge(['class' => 'mt-6 space-y-6']) }}
    action="{{ $action }}"
    @if($method === 'get')
        method="{{ $method }}"
    @else
        method="post"
    @endif
>
    @csrf
    @if(!in_array($method, ['get', 'post']))
        @method($method)
    @endif
    {{ $slot }}
</form>

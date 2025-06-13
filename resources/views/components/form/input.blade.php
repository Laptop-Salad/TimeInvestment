@props([
    'type' => 'text',
])

<input
    type="{{$type}}"
    {{$attributes->merge(['class' => 'shadow-sm border border-muted rounded-lg rounded-lg focus:outline-none text-muted text-sm'])}}
/>
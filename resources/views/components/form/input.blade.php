@props([
    'type' => 'text',
    'textarea' => false,
])

@if ($textarea)
    <textarea {{$attributes->merge(['class' => 'input'])}}></textarea>
@else
    <input
        type="{{$type}}"
        {{$attributes->merge(['class' => 'input'])}}
    />
@endif
@props([
    'label',
])

<x-form.input-group :$label {{$attributes}}>
    <x-form.input type="date" {{$attributes}} />
</x-form.input-group>
@props([
    'label',
    'type' => 'text',
    'textarea' => false
])

<x-form.input-group :$label {{$attributes}}>
    <x-form.input :$type :$textarea {{$attributes}} />
</x-form.input-group>
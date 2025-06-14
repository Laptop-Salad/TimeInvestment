@props([
    'label',
])

<x-form.input-group :$label {{$attributes}}>
    <select {{$attributes->merge(['class' => 'input'])}}>
        {{$slot}}
    </select>
</x-form.input-group>
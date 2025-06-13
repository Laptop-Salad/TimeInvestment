@props([
    'label',
])

<x-form.input-group :$label {{$attributes}}>
    <select
        {{$attributes->merge(['class' => 'shadow-sm border border-muted rounded-lg rounded-lg focus:outline-none text-muted text-sm'])}}
    >
        {{$slot}}
    </select>
</x-form.input-group>
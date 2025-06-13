@props([
    'label',
])

@php($key = $attributes->first(fn($value, $key) => str_starts_with($key, 'wire:model')))

<div class="flex flex-col justify-end">
    <label for="{{$key}}" class="text-sm font-medium ms-1 mb-2">{{$label}}</label>

    {{$slot}}

    <x-input-error :messages="$errors->get($key)" class="mt-2" />

    @isset($help)
        <p class="text-xs text-muted">{{$help}}</p>
    @endisset
</div>
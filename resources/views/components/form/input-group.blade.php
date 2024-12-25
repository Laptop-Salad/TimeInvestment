@props([
    'for',
    'label'
])

<div>
    <x-input-label :$for :value="$label" />

    {{$slot}}

    <x-input-error :messages="$errors->get($for)" class="mt-2" />

    @isset($help)
        <p class="text-xs text-muted">{{$help}}</p>
    @endisset
</div>

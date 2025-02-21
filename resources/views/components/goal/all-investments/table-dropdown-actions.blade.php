@props([
    'investment'
])

<x-dropdown.item wire:click="$parent.addInvestment({{$investment->id}})">
    Add to Goal
</x-dropdown.item>

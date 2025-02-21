@props([
    'investment'
])

<x-dropdown.item wire:click="$parent.removeInvestment({{$investment->id}})">
    Remove from Goal
</x-dropdown.item>

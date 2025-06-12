@props([
    'href' => null,

    'variant' => 'primary',
])

@php($tag = isset($href) ? 'a' : 'button')

<{{$tag}}
    href="{{$href}}"
    {{$attributes->class([
        'rounded-md px-6 py-2 text-muted font-medium',
        'bg-primary box-shadow-sm border border-primary' => $variant === 'primary',
        '' => $variant === 'ghost',
    ])}}
>
    {{$slot}}
</{{$tag}}>
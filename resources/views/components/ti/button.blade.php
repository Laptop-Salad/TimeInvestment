@props([
    'href' => null,

    'variant' => 'primary',
    'size' => 'base',
])

@php($tag = isset($href) ? 'a' : 'button')

<{{$tag}}
    href="{{$href}}"
    {{$attributes->class([
        'rounded-md text-muted font-medium',
        'px-6 py-2' => $size === 'base',
        'px-3 py-1 text-sm' => $size === 'sm',
        'bg-primary box-shadow-sm border border-primary' => $variant === 'primary',
        '' => $variant === 'ghost',
    ])}}
>
    {{$slot}}
</{{$tag}}>
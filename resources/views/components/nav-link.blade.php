@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-blue-600 font-bold border-b-2 border-blue-600 pb-1'
            : 'text-gray-600 hover:text-blue-600 transition pb-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>

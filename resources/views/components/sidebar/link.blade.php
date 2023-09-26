@props([
    'isActive' => false,
    'title' => '',
    'collapsible' => false
])

@php
    $isActiveClasses =  $isActive ? 'text-white shadow-lg hover:primary' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:hover:text-gray-300 dark:hover:bg-dark-eval-2';

    $classes = 'flex-shrink-0 flex items-center p-[10px] transition-colors rounded-full overflow-hidden ' . $isActiveClasses;

    if($collapsible) $classes .= ' w-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $icon }}
</a>

@props(['name', 'maxWidth' => '2xl'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        'auto' => 'sm:w-auto'
    ][$maxWidth];
@endphp

<div x-data="{ show: false, name: '{{ $name }}' }" x-show="show" x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" style="display:none;"
    class="fixed inset-4 z-50 overflow-y-auto overflow-hidden flex items-center justify-center" x-transition.duration>
    {{-- Gray Background --}}
    <div x-on:click="show = false" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity bg-gray-300 dark:bg-dark-eval-1 opacity-60 overflow-hidden"
        aria-hidden="true">
    </div>

    {{-- Modal Body --}}
    <div x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="overflow-y-auto my-auto inline-block w-full max-w-xl p-8 text-left transition-all transform bg-white dark:bg-dark-eval-0 rounded-lg shadow-xl {{ $maxWidth }}">
        <div class="overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>

<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-7 px-11 pt-6"
>
    <x-sidebar.link
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.home class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link
        href="{{ route('categories.index') }}"
        :isActive="request()->routeIs('categories.index')"
    >
        <x-slot name="icon">
            <x-icons.widget class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link
        href="{{ route('products.index') }}"
        :isActive="request()->routeIs('products.index')"
    >
        <x-slot name="icon">
            <x-icons.box class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link
        href="{{ route('sales.index') }}"
        :isActive="request()->routeIs('sales.index')"
    >
        <x-slot name="icon">
            <x-icons.money-bag class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link
        href="{{ route('entry-guides.index') }}"
        :isActive="request()->routeIs('entry-guides.index')"
    >
        <x-slot name="icon">
            <x-icons.cube-plus class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
</x-perfect-scrollbar>

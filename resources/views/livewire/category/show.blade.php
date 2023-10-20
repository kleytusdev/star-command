<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Categorías" />
    <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
        <div class="mb-5">
            @livewire('category.store')
        </div>
        <x-table-categories :categories="$categories" />
    </div>
</div>

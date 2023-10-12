<div>
    <!-- Navbar -->
    <x-navbar title="Categorías" />
    <div class="flex-1 flex flex-col gap-5 h-[90%]">
        @livewire('category.store')
        <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-7">
            <x-table-categories :categories="$categories" />
        </div>
    </div>
</div>

<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Productos" />
    <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
        <div class="mb-5">
            @livewire('product.store')
        </div>
        <x-table-products :products="$products" />
    </div>
</div>

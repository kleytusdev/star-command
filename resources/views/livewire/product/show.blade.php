<div>
    <!-- Navbar -->
    <x-navbar title="Productos"/>
    <div class="flex-1 flex flex-col gap-5 h-[90%]">
        @livewire('product.store')
        <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-7">
            <x-table-products :products="$products" />
        </div>
    </div>
</div>

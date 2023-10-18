<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Dashboard" />
    <div class="flex-1 flex gap-5 flex-row">
        <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            <div class="mb-5">
                @livewire('sale.store')
            </div>
            <x:table-sales />
        </div>
        <div class="flex flex-[0.20] flex-col p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto gap-5">
            <div class="flex">
                <h1 class="text-lg font-semibold leading-tight">Últimas ventas</h1>
            </div>
            {{-- @livewire('warehouse.show') --}}
        </div>
    </div>
</div>

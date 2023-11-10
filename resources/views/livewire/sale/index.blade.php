<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Ventas" />
    <div class="flex-1 flex gap-5 flex-row">
        <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            <div class="mb-5">
                <a href="{{ route('sales.create') }}" class="btn btn-outline btn-primary btn-sm normal-case">
                    Registrar una nueva venta
                </a>
            </div>
            @livewire('sale.table-sales')
        </div>
    </div>
</div>

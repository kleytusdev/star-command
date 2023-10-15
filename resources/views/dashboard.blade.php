<x-app-layout>
    <!-- Navbar -->
    <x-navbar title="Dashboard" />
    <div class="flex-1 flex gap-5 h-[90%] flex-row">
        <div class="flex-col flex flex-1 gap-5">
            <div class="flex flex-2 flex-row justify-between gap-5 h-[25%]">
                <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-5">
                    <div class="flex flex-[0.5] items-center space-x-4">
                        <div class="p-3 rounded-xl border-primary border">
                            <x-icons.dollar-minimalistic class="flex-shrink-0 w-6 h-6 text-primary" aria-hidden="true" />
                        </div>
                        <div class="flex flex-row gap-1">
                            <x-icons.circle-arrow-down-right-filled class="flex-shrink-0 w-6 h-6 text-warning"
                                aria-hidden="true" />
                            <p class="text-p-red">-2,77 %</p>
                        </div>
                    </div>
                    <div class="flex flex-[0.5] flex-row items-end justify-between">
                        <div class="flex-col flex gap-1 justify-between">
                            <p class="text-accent">Total de ventas</p>
                            <p class="font-bold">S/ 7000.00</p>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <x-icons.calendar-stats class="w-6 h-6 text-primary" aria-hidden="true" />
                            <p class="text-primary">Último mes</p>
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-5">
                    <div class="flex flex-[0.5] items-center space-x-4">
                        <div class="p-3 rounded-xl border-primary border">
                            <x-icons.graph-new-up class="flex-shrink-0 w-6 h-6 text-primary" aria-hidden="true" />
                        </div>
                        <div class="flex flex-row gap-1">
                            <x-icons.circle-arrow-up-right-filled class="w-6 h-6 text-success" aria-hidden="true" />
                            <p class="text-p-green">+44,25 %</p>
                        </div>
                    </div>
                    <div class="flex flex-[0.5] flex-row items-end justify-between">
                        <div class="flex-col flex gap-1 justify-between">
                            <p class="text-accent">Total de ventas</p>
                            <p class="font-bold">S/ 7000.00</p>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <x-icons.calendar-stats class="w-6 h-6 text-primary" aria-hidden="true" />
                            <p class="text-primary">Último mes</p>
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-5">
                    <div class="flex flex-[0.5] items-center space-x-4">
                        <div class="p-3 rounded-xl border-primary border">
                            <x-icons.cube-plus class="flex-shrink-0 w-6 h-6 text-primary" aria-hidden="true" />
                        </div>
                        <div class="flex flex-row gap-1">
                            <x-icons.circle-arrow-up-right-filled class="w-6 h-6 text-success" aria-hidden="true" />
                            <p class="text-p-green">+16,25 %</p>
                        </div>
                    </div>
                    <div class="flex flex-[0.5] flex-row items-end justify-between">
                        <div class="flex-col flex gap-1 justify-between">
                            <p class="text-accent font-work">Total de ventas</p>
                            <p class="font-bold">S/ 7000.00</p>
                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <x-icons.calendar-stats class="w-6 h-6 text-primary" aria-hidden="true" />
                            <p class="text-primary">Último mes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 flex-row gap-5">
                <div class="flex flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-1">
                    <p>Estadísticas de ventas</p>
                </div>
                <div class="flex flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-1">
                    <p>Estadísticas de entrada productos</p>
                </div>
            </div>
            <div class="p-6 bg-white rounded-xl dark:bg-dark-eval-1">
                <x:table-subusers />
            </div>
        </div>
        <div class="flex flex-[0.25] flex-col p-6 bg-white rounded-xl dark:bg-dark-eval-1 overflow-y-auto">
            <h1 class="text-xl font-semibold leading-tight">Almacenes</h1>
            @livewire('warehouse.show')
        </div>
    </div>
</x-app-layout>

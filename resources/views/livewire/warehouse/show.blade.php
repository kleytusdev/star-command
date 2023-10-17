<div class="flex flex-col rounded-lg text-[0.8125rem] leading-5 text-white shadow-black/5 max-h-[9.5vw] overflow-y-auto my-4 pr-2 gap-4">
    @if (!$warehouses)
        <div class="flex items-center p-4 bg-white dark:bg-dark-eval-2 rounded-lg my-5">
            <div class="flex flex-1 flex-col ml-4 w-[100%] justify-center items-center self-center">
                <div class="text-slate-900 dark:text-slate-200 font-semibold">
                    Aún no tienes ningún almacén registrado en tu empresa.
                </div>
                <button
                class="mt-4 self-center font-bold pointer-events-auto rounded-md px-2 py-[0.3125rem] text-slate-700 dark:text-primary shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 dark:hover:bg-dark-eval-3"
                x-on:click="$dispatch('open-modal', { name: 'storeWarehouse' })">Crear un nuevo almacén</button>
            </div>
            @livewire('warehouse.store')
        </div>
    @endif
    @foreach ($warehouses as $warehouse)
        <div class="flex items-center p-4 bg-white dark:bg-dark-eval-2 rounded-lg">
            <div class="flex rounded-xl border-2 border-primary justify-center p-2">
                <x-icons.warehouse class="w-6 h-6 text-primary self-center" aria-hidden="true" />
            </div>
            <div class="ml-4 w-[55%]">
                <div class="text-slate-900 dark:text-slate-200 font-semibold whitespace-no-wrap">
                    <p class="whitespace-no-wrap truncate overflow-ellipsis overflow-hidden">
                        {{ $warehouse->name }}
                    </p>
                </div>
                <div class="mt-1 text-slate-800 dark:text-slate-200 whitespace-no-wrap">
                    <p class="whitespace-no-wrap truncate overflow-ellipsis overflow-hidden">
                        {{ $warehouse->address }}
                    </p>
                </div>
            </div>
            @livewire('warehouse.edit', ['warehouse' => $warehouse])
        </div>
    @endforeach
</div>

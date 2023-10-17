<div class="flex flex-col rounded-lg text-[0.8125rem] leading-5 text-white shadow-black/5 max-h-[23vw] overflow-y-auto my-4 pr-2 gap-4">
    @if ($warehouses->isEmpty())
        <div class="flex flex-1 justify-center self-center items-center p-4 bg-white dark:bg-dark-eval-2 rounded-lg">
            <div class="flex flex-1 flex-col justify-center items-center self-center">
                <div class="text-center text-slate-900 dark:text-slate-200 font-semibold">
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
        <div class="flex flex-1 items-center p-4 bg-white dark:bg-dark-eval-2 rounded-lg gap-3">
            <div class="flex rounded-xl border-2 border-primary justify-center p-2">
                <x-icons.warehouse class="w-6 h-6 text-primary self-center" aria-hidden="true" />
            </div>
            <div class="flex flex-1 flex-col">
                <div class="w-[5vw] text-slate-900 dark:text-slate-200 font-semibold whitespace-no-wrap">
                    <p class="whitespace-no-wrap truncate overflow-ellipsis overflow-hidden">
                        {{ $warehouse->name }}
                    </p>
                </div>
                <div class="w-[5vw]  mt-1 text-slate-800 dark:text-slate-200 whitespace-no-wrap">
                    <p class="whitespace-no-wrap truncate overflow-ellipsis overflow-hidden">
                        {{ $warehouse->address }}
                    </p>
                </div>
            </div>
            <div class="flex flex-2 flex-col gap-2">
                @livewire('warehouse.edit', ['warehouse' => $warehouse])
                @livewire('warehouse.destroy', ['warehouse' => $warehouse])
            </div>
        </div>
    @endforeach
</div>

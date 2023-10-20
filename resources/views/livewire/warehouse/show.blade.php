<div class="flex flex-col rounded-lg text-[0.8125rem] leading-5 text-white shadow-black/5 max-h-[23vw] overflow-y-auto my-4 pr-2 gap-4">
    <div class="flex flex-1 justify-center self-center items-center p-4 bg-white dark:bg-dark-eval-0 rounded-lg">
            <div class="flex flex-1 flex-col justify-center items-center self-center">
                <div class="text-center text-slate-900 dark:text-slate-200 font-semibold">
                    @if ($warehouses->isEmpty())
                    Aún no tienes ningún almacén registrado en tu empresa.
                    @endif
                </div>
                <button
                class="btn btn-ghost btn-sm border-1 border-gray-200 dark:border-dark-eval-1 normal-case self-center text-slate-700 dark:text-primary shadow-sm"
                x-on:click="$dispatch('open-modal', { name: 'storeWarehouse' })">Crear un nuevo almacén</button>
            </div>
            @livewire('warehouse.store')
        </div>
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
            <div class="flex flex-2 flex-col gap-3">
                @livewire('warehouse.edit', ['warehouse' => $warehouse])
                @livewire('warehouse.destroy', ['warehouse' => $warehouse])
            </div>
        </div>
    @endforeach
</div>

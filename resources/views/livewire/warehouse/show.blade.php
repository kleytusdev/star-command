<div class="flex-col rounded-lg text-[0.8125rem] leading-5 text-white shadow-black/5 max-h-[11.5vw] overflow-y-auto">
    @foreach ($warehouses as $warehouse)
        <div class="flex items-center p-4 bg-gray-200 dark:bg-dark-eval-2 rounded-lg my-6">
            <div class="flex rounded-xl border-2 border-primary justify-center p-2">
                <x-icons.warehouse class="w-6 h-6 text-primary self-center" aria-hidden="true" />
            </div>
            <div class="ml-4 w-[60%]">
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

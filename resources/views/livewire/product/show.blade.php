<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Producto {{ $product->name }}" />
    <div class="flex-1 items-center py-10 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
        <div
            class="mx-auto flex max-w-sm flex-col gap-4 rounded-xl border-[1px] border-gray-200 dark:border-dark-eval-2 py-4 px-4 text-left">
            <img class="rounded-xl h-65 object-cover md:w-[100%]"
                src="{{ asset('storage/products/' . $product->photo_uri) }}" alt="" />
            <div class="flex flex-col gap-3">
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $product->name }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200">{{ $product->category->name }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200"><span class="font-bold">Modelo:</span> {{ $product->model }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200"><span class="font-bold">Marca:</span> {{ $product->brand }}</p>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-200"><span class="font-bold">Stock disponible:</span> {{ $product->stock }}</p>
                <p class="mt-5 text-sm font-light text-gray-500 dark:text-gray-200">Este producto fue vendido<span class="font-bold"> {{ $totalQuantity }}</span>
                    veces, con un total de ventas de <span class="font-bold">S/ {{ $totalAmount }}</p>
                <div class="flex items-center mt-4">
                    @if ($product->status->value === 'Activo')
                        <div class="h-2.5 w-2.5 rounded-full bg-p-green mr-2"></div> <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $product->status }}</p>
                    @else
                        <div class="h-2.5 w-2.5 rounded-full bg-p-red mr-2"></div> <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $product->status }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

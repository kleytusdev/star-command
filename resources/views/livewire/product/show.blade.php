<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Productos" />
    <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
        <div
            class="mx-auto my-auto flex max-w-xs flex-col items-center rounded-xl border-[1px] border-gray-200 dark:border-dark-eval-2 px-4 py-4 text-center md:max-w-lg md:flex-row md:items-center md:text-left">
            <div class="md:mr-6 md:mb-0">
                <img class="h-56 rounded-lg object-cover md:w-56"
                    src="{{ asset('storage/products/' . $product->photo_uri) }}" alt="" />
            </div>
            <div class="">
                <p class="text-xl font-semibold text-gray-700 dark:text-white">{{ $product->name }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200">{{ $product->category->name }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200">{{ $product->model }}</p>
                <p class="mb-4 text-sm font-medium text-gray-500 dark:text-gray-200">{{ $product->brand }}</p>
                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">Stock disponible: {{ $product->stock }}</p>
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

<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-justify text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th>Nombre del producto</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productsData as $index => $product)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th>{{ $product['name'] }}</th>
                    <th>
                        <div class="avatar">
                            <div class="w-12 mask mask-squircle">
                                <img src={{ asset('storage/products/' . $product['photo_uri']) }} />
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="flex items-center">
                            @if ($product['status'] === 'Sellado')
                                <div class="h-2.5 w-2.5 rounded-full bg-p-green mr-2"></div> {{ $product['status'] }}
                            @elseif ($product['status'] === 'Reacondicionado')
                                <div class="h-2.5 w-2.5 rounded-full bg-p-orange mr-2"></div> {{ $product['status'] }}
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-p-red mr-2"></div> {{ $product['status'] }}
                            @endif
                        </div>
                    </th>
                    <th>{{ $product['price'] }}</th>
                    <th>{{ $product['quantity'] }}</th>
                    <th>{{ $product['total'] }}</th>
                    <th class="text-center">
                        <button class="btn btn-outline btn-primary btn-sm normal-case content-center"
                            wire:click="removeProduct({{ $index }})">
                            Eliminar
                        </button>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

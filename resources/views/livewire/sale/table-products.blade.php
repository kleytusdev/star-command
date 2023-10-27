<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-justify text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th>Nombre del producto</th>
                <th>Imagen</th>
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

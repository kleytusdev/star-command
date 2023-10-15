@props(['products'])
<table class="w-[100%] text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-dark-eval-1 dark:text-gray-400">
        <tr>
            <th scope="col" class="pb-3">
                ID
            </th>
            <th scope="col" class="pb-3">
                Imagen
            </th>
            <th scope="col" class="pb-3">
                Nombre
            </th>
            <th scope="col" class="pb-3">
                Precio
            </th>
            <th scope="col" class="pb-3">
                Marca
            </th>
            <th scope="col" class="pb-3">
                Modelo
            </th>
            <th scope="col" class="pb-3">
                Stock
            </th>
            <th scope="col" class="pb-3">
                Código QR
            </th>
            <th scope="col" class="pb-3">
                Estado
            </th>
            <th scope="col" class="pb-3">
                Acción
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr
                class="bg-white border-b dark:bg-dark-eval-1 dark:border-dark-eval-3 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="py-4">
                    {{ $product->id }}
                </th>
                <td>
                    <img class="w-10 h-10 rounded-full" src={{ asset('storage/products/' . $product->photo_uri ) }}>
                </td>
                <td scope="row" class="flex items-center py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="text-base font-semibold">{{ $product->name }}</div>
                </td>
                <td class="py-4">
                    {{ $product->price }}
                </td>
                <td class="py-4">
                    {{ $product->brand }}
                </td>
                <td class="py-4">
                    {{ $product->model }}
                </td>
                <td class="py-4">
                    {{ $product->stock }}
                </td>
                <td class="py-4">
                    {{ $product->qr_code }}
                </td>
                <td class="py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{ $product->status }}
                    </div>
                </td>
                <td class="py-4">
                    <!-- Modal toggle -->
                    <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

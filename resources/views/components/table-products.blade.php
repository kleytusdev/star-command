@props(['products'])
<div class="w-[100%] overflow-x-auto">
    <table class="table table-zebra">
        <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Stock</th>
                <th>Código QR</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th>{{ $product->id }}</th>
                    <th>
                        <div class="avatar">
                            <div class="w-12 mask mask-squircle">
                                <img src={{ asset('storage/products/' . $product->photo_uri) }} />
                            </div>
                        </div>
                    </th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->qr_code }}</td>
                    <td>
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{ $product->status }}
                        </div>
                    </td>
                    <td>
                        <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                        >
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

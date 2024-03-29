@props(['products'])
<table class="w-[100%] overflow-x-auto table">
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
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                <th>{{ $product->id }}</th>
                <td>
                    <div class="avatar">
                        <div class="w-12 mask mask-squircle">
                            <img src={{ asset('storage/products/' . $product->photo_uri) }} />
                        </div>
                    </div>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->stock }}</td>
                <td>@livewire('qr-code.show', ['product' => $product])</td>
                <td>
                    <div class="flex items-center">
                        @if ($product->status->value === 'Activo')
                            <div class="h-2.5 w-2.5 rounded-full bg-p-green mr-2"></div> {{ $product->status }}
                        @else
                            <div class="h-2.5 w-2.5 rounded-full bg-p-red mr-2"></div> {{ $product->status }}
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

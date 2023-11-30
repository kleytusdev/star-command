<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th>ID</th>
                <th>Imagen producto</th>
                <th>Nombre producto</th>
                <th>Stock anterior</th>
                <th>Stock actual</th>
                <th>Cantidad saliente</th>
                <th>Total</th>
                <th>Empleado</th>
                <th>Fecha de orden</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guides as $guide)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th>{{ $guide->id }}</th>
                    <th>
                        <div class="avatar border-0 relative">
                            @if ($guide->status === 'Activo')
                                <div
                                    class="absolute top-0 right-0 z-10 w-[10px] bg-p-green rounded-full border border-dark-eval-0">
                                </div>
                            @elseif ($guide->status === 'Agotado')
                                <div
                                    class="absolute top-0 right-0 z-10 w-[10px] bg-p-orange rounded-full border border-dark-eval-0">
                                </div>
                            @else
                                <div
                                    class="absolute top-0 right-0 z-10 w-[10px] bg-p-red rounded-full border border-dark-eval-0">
                                </div>
                            @endif
                            <div class="w-12 mask mask-squircle">
                                <img src="{{ asset('storage/products/' . $guide->productPhotoUri) }}" />
                            </div>
                        </div>
                    </th>
                    <th>{{ $guide->productName }}</th>
                    <td>{{ $guide->prevStock }}</td>
                    <td>{{ $guide->currentStock }}</td>
                    <td>{{ $guide->quantity }}</td>
                    <td>{{ $guide->total }}</td>
                    <td>{{ $guide->createdBy }}</td>
                    <td>{{ $guide->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th></th>
                <th>Productos</th>
                <th>Observación</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Fecha de orden</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guides as $guide)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th>{{ $guide->id }}</th>
                    <th>
                        <div class="avatar-group -space-x-6">
                            @php
                                $maxUris = 3;
                                $totalUris = count($guide->productsPhotoUri);
                            @endphp

                            @for ($i = 0; $i < min($maxUris, $totalUris); $i++)
                                <div class="avatar border-0">
                                    <div class="w-12 mask mask-squircle">
                                        <img src="{{ asset('storage/products/' . $guide->productsPhotoUri[$i]->uri) }}" />
                                    </div>
                                </div>
                            @endfor

                            @if ($totalUris > $maxUris)
                                <div class="avatar placeholder">
                                    <div class="w-12 bg-neutral-focus text-neutral-content">
                                        <span>+{{ $totalUris - $maxUris }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </th>
                    <td>{{ $guide->observation }}</td>
                    <td>{{ $guide->quantity }}</td>
                    <td>{{ $guide->unitPrice }}</td>
                    <td>{{ $guide->total }}</td>
                    <td>{{ $guide->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th></th>
                <th>Productos</th>
                <th>Cliente</th>
                <th>IGV</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th>Método de pago</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th>{{ $sale->id }}</th>
                    <th>
                        <div class="avatar-group -space-x-6">
                            @php
                                $maxUris = 3;
                                $totalUris = count($sale->productsPhotoUri);
                            @endphp

                            @for ($i = 0; $i < min($maxUris, $totalUris); $i++)
                                <div class="avatar border-0">
                                    <div class="w-12 mask mask-squircle">
                                        <img src="{{ asset('storage/products/' . $sale->productsPhotoUri[$i]->uri) }}" />
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
                    <td>{{ $sale->client }}</td>
                    <td>{{ $sale->igv }}</td>
                    <td>{{ $sale->subtotal }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>{{ $sale->paymentMethod }}</td>
                    <td>{{ $sale->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

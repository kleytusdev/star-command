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
                            <div class="avatar border-0">
                                <div class="w-12 mask mask-squircle">
                                    <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
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

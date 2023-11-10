<div class="flex flex-row gap-10 items-center">
    <!-- Almacen -->
    <div class="space-y-2">
        <x-form.label for="warehouseId" :value="__('Almacén')" />
        <select
            class="form-control border-gray-400 rounded-md focus:border-gray-400
            focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
            dark:text-gray-300 p-2"
            id="warehouseId" name="warehouseId" wire:model.live="warehouseId">
            <option value="">Todos los almacenes</option>
            @if ($warehouses->count() > 0)
                @foreach ($warehouses as $warehouse)
                    <option class="font-nunito" value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endForeach
            @else
                No se encontraron registros
            @endif
        </select>
    </div>

    <!-- Producto -->
    <div class="space-y-2">
        <x-form.label for="productId" :value="__('Producto')" />
        <select
            class="form-control border-gray-400 rounded-md focus:border-gray-400
            focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
            dark:text-gray-300 p-2"
            id="productId" name="productId" wire:model.live="productId">
            <option value="">Seleccione un producto</option>
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <option class="font-nunito" value="{{ $product->id }}">{{ $product->name }}</option>
                @endForeach
            @else
                No se encontraron registros
            @endif
        </select>
    </div>
</div>

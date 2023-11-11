<div>
    <x:modal name="storeProduct" maxWidth="lg" x-show="modalOpen">
        <form wire:submit.prevent="store">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <!-- Agrega tus campos de formulario aquí -->
            <div class="grid gap-6">
                <!-- Nombre -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Name')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="name" withicon id="name" class="block w-full" type="text"
                            name="name" :value="old('name')" required autofocus placeholder="{{ __('Name') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Precio -->
                <div class="space-y-2">
                    <x-form.label for="price" :value="__('Precio')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.dollar-minimalistic aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="price" withicon id="price" class="block w-full" type="text"
                            name="price" :value="old('price')" required placeholder="{{ __('Precio') }}"
                            oninput="this.value = this.value.replace(/[^0-9.]+/g, '').replace(/(\.\d\d).*/g, '$1').replace(/(\.\d*)\./g, '$1');" />
                    </x-form.input-with-icon-wrapper>
                    @error('price')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Marca -->
                <div class="space-y-2">
                    <x-form.label for="brand" :value="__('Marca')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.brand aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="brand" withicon id="brand" class="block w-full" type="text"
                            name="brand" :value="old('brand')" required placeholder="{{ __('Marca') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Modelo -->
                <div class="space-y-2">
                    <x-form.label for="model" :value="__('Modelo')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.model aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="model" withicon id="model" class="block w-full" type="text"
                            name="model" :value="old('model')" required placeholder="{{ __('Modelo') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Stock -->
                <div class="space-y-2">
                    <x-form.label for="stock" :value="__('Stock')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.stock aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="stock" withicon id="stock" class="block w-full" type="text"
                            name="stock" :value="old('stock')" required placeholder="{{ __('Stock') }}" maxlength='6'
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Foto -->
                <div class="space-y-2">
                    <x-form.label for="photoUri" :value="__('Foto')" />
                    <input wire:model="photoUri" id="photoUri" name="photoUri" type="file"
                        class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                </div>
                @if ($photoUri)
                    <div class="flex justify-center">
                        <img class="w-[10vw] y-[10vw] rounded-full object-cover self-center"
                            src="{{ $photoUri->temporaryUrl() }}">
                    </div>
                @endif

                <!-- Categoría -->
                <div class="space-y-2">
                    <x-form.label for="category" :value="__('Categoría')" />
                    <select
                        class="form-control border-gray-400 rounded-md focus:border-gray-400
                        focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                        dark:text-gray-300 p-2"
                        id="categoryId" name="categoryId" wire:model="categoryId">
                        <option value="">Seleccione una categoría</option>
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <option class="font-nunito" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endForeach
                        @else
                            No Record Found
                        @endif
                    </select>
                </div>

                <!-- Almacén -->
                <div class="space-y-2">
                    <x-form.label for="warehouse" :value="__('Almacén')" />
                    <select
                        class="form-control border-gray-400 rounded-md focus:border-gray-400
                        focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                        dark:text-gray-300 p-2"
                        id="warehouseId" name="warehouseId" wire:model="warehouseId">
                        <option value="" selected>Seleccione un almacén</option>
                        @if ($warehouses->count() > 0)
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">
                                    {{ $warehouse->name }}</option>
                            @endForeach
                        @else
                            No Record Found
                        @endif
                    </select>
                </div>
            </div>
            <div class="flex flex-1 flex-row justify-center gap-5 mt-10">
                <button class="btn btn-outline btn-primary" x-on:click="$dispatch('close-modal')"
                    type="button">Cerrar</button>
                <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="store, photoUri">
                    <span wire:loading.@class(['loading loading-spinner'])>Guardar</span>
                </button>
            </div>
        </form>
    </x:modal>
    <button class="btn btn-outline btn-primary btn-sm normal-case"
        x-on:click="$dispatch('open-modal', { name: 'storeProduct' })">Crear
        producto</button>
</div>

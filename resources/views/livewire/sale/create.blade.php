<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Registrar una nueva venta" />
    <div class="flex flex-1 flex-col h-[100%]">
        <div class="flex-1 flex-col p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            <form wire:submit.prevent="store" method="POST">
                @csrf
                <!-- Agrega tus campos de formulario aquí -->
                <div class="grid gap-6">
                    <!-- Tipo de cliente -->
                    <span class="label-text text-base font-semibold -mb-3">Seleccionar el tipo de cliente</span>
                    <div class="flex flex-1 items-center gap-5 flex-row" x-data="{ selectedOption: 'DNI' }">
                        <div class="flex flex-3 flex-col self-end">
                            <label class="label cursor-pointer gap-5">
                                <span class="label-text">DNI</span>
                                <input type="radio" name="radio-1" class="radio radio-primary checked:bg-primary"
                                    x-model="selectedOption" value="DNI" checked />
                            </label>
                            <label class="label cursor-pointer gap-5">
                                <span class="label-text">RUC</span>
                                <input type="radio" name="radio-1" class="radio radio-primary checked:bg-primary"
                                    x-model="selectedOption" value="RUC" />
                            </label>
                        </div>
                        <div class="flex flex-1">
                            <!-- DNI -->
                            <div class="w-[100%]" x-show="selectedOption === 'DNI'">
                                @livewire('credentials.dni-lookup')
                            </div>

                            <!-- RUC -->
                            <div class="w-[100%]" x-show="selectedOption === 'RUC'">
                                @livewire('credentials.ruc-lookup')
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row gap-10 justify-between items-center">
                        <!-- Método de pagos -->
                        <div class="space-y-2">
                            <x-form.label for="paymentMethod" :value="__('Método de pago')" />
                            <select
                                class="form-control border-gray-400 rounded-md focus:border-gray-400
                                focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                                dark:text-gray-300"
                                id="paymentMethod" name="paymentMethod" wire:model="paymentMethod">
                                <option value="">Seleccione un método de pago</option>
                                @foreach ($paymentMethods as $method)
                                    <option class="font-nunito" value="{{ $method->value }}">
                                        {{ $method->value }}
                                    </option>
                                @endForeach
                            </select>
                        </div>

                        @livewire('components.dropdown')

                        <!-- Precio -->
                        <div class="space-y-2">
                            <x-form.label for="price" :value="__('Precio')" />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.dollar-minimalistic aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input wire:model="price" withicon id="price" class="block w-full"
                                    type="text" name="price" :value="$price" required disabled
                                    placeholder="{{ __('Precio') }}" />
                            </x-form.input-with-icon-wrapper>
                            @error('price')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="space-y-2">
                            <x-form.label for="quantity" :value="__('Cantidad')" />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.stock aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input wire:model="quantity" withicon id="quantity" class="block w-full"
                                    type="text" name="quantity" :value="old('quantity')" required
                                    placeholder="{{ __('Cantidad') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                            </x-form.input-with-icon-wrapper>
                            @error('quantity')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Agregar producto -->
                        <div class="space-y-2 self-end">
                            <button wire:click="addProduct" class="btn btn-outline btn-primary btn-sm normal-case py-5 content-center">
                                Agregar producto
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    @livewire('sale.table-products')
                </div>
                <div class="flex flex-1 flex-row justify-center gap-5 mt-10">
                    <button class="btn btn-primary" type="submit" wire:click.prevent="store()">
                        <span wire:loading.@class(['loading loading-spinner'])>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

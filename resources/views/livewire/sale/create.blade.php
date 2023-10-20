<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Registrar una nueva venta" />
    <div class="flex flex-1 flex-col h-[100%]">
        <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            <form wire:submit.prevent="store">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @csrf
                <!-- Agrega tus campos de formulario aquí -->
                <div class="grid gap-6">
                    <!-- Tipo de cliente -->
                    <span class="label-text text-base font-semibold -mb-3">Seleccionar el tipo de cliente</span>
                    <div class="flex flex-1 items-center gap-5 flex-row" x-data="{ selectedOption: 'DNI' }">
                        <div class="flex flex-3 flex-col">
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
                            <div class="w-[100%] space-y-2" x-show="selectedOption === 'DNI'">
                                <x-form.label for="DNI" :value="__('DNI')" />
                                <x-form.input-with-icon-wrapper>
                                    <x-slot name="icon">
                                        <x-icons.document aria-hidden="true" class="w-5 h-5" />
                                    </x-slot>
                                    <x-form.input wire:model="DNI" withicon id="DNI" class="block w-full"
                                        type="text" name="DNI" :value="old('DNI')" required autofocus
                                        placeholder="{{ __('DNI') }}" maxlength="8"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />

                                </x-form.input-with-icon-wrapper>
                            </div>

                            <!-- RUC -->
                            <div class="w-[100%] space-y-2" x-show="selectedOption === 'RUC'">
                                <x-form.label for="RUC" :value="__('RUC')" />
                                <x-form.input-with-icon-wrapper>
                                    <x-slot name="icon">
                                        <x-icons.document aria-hidden="true" class="w-5 h-5" />
                                    </x-slot>
                                    <x-form.input wire:model="RUC" withicon id="RUC" class="block w-full"
                                        type="text" name="RUC" :value="old('RUC')" required autofocus
                                        placeholder="{{ __('RUC') }}"
                                        maxlength="11"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                </x-form.input-with-icon-wrapper>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row gap-10">
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
                                        <option class="font-nunito" value="{{ $method->name }}">{{ $method->value }}</option>
                                    @endForeach
                            </select>
                        </div>

                        @livewire('components.dropdown')

                        <!-- Precio -->
                        <div class="space-y-2 flex-[0.14]">
                            <x-form.label for="price" :value="__('Precio')" />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.dollar-minimalistic aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input wire:model="price" withicon id="price" class="block w-full" type="text"
                                    name="price" :value="old('price')" required placeholder="{{ __('Precio') }}"
                                    disabled
                                />
                            </x-form.input-with-icon-wrapper>
                            @error('price')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
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
                                name="stock" :value="old('stock')" required placeholder="{{ __('Stock') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" />

                        </x-form.input-with-icon-wrapper>
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
        </div>
    </div>
</div>

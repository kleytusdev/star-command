<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Registrar nueva guía de entrada" />
    <div class="flex flex-1 flex-col h-[100%]">
        <div class="flex-1 flex-col p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            <form wire:submit.prevent="store" method="POST">
                @csrf
                <!-- Agrega tus campos de formulario aquí -->
                <div class="grid gap-6">
                    <div class="flex flex-row justify-between items-center">
                        @livewire('components.dropdown')
                        <!-- Precio -->
                        <div class="space-y-2">
                            <x-form.label for="price" :value="__('Precio')" />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.dollar-minimalistic aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input wire:model="price" withicon id="price" class="block w-full"
                                    type="text" name="price" :value="$price" required
                                    placeholder="{{ __('Precio') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]+/g, '').replace(/(\.\d\d).*/g, '$1').replace(/(\.\d*)\./g, '$1');"
                                />
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
                                    placeholder="{{ __('Cantidad') }}" maxlength='6'
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                            </x-form.input-with-icon-wrapper>
                            @error('quantity')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="space-y-2">
                            <x-form.label for="status" :value="__('Estado')" />
                            <select
                                class="form-control border-gray-400 rounded-md focus:border-gray-400
                                focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                                dark:text-gray-300 p-2" required
                                id="status" name="status" wire:model="status">
                                <option value="" selected>Seleccione un estado</option>
                                @foreach ($statuses as $status)
                                    <option class="font-nunito" value="{{ $status->value }}">
                                        {{ $status->value }}
                                    </option>
                                @endForeach
                            </select>
                            @error('status')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Fecha de orden -->
                        <div class="space-y-2">
                            <x-form.label for="orderAt" :value="__('Fecha de orden')" />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.stock aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input wire:model="orderAt" withicon id="orderAt" class="block w-full"
                                    type="datetime-local" name="orderAt" :value="old('orderAt')" required
                                    placeholder="{{ __('Fecha de orden') }}" />
                            </x-form.input-with-icon-wrapper>
                            @error('orderAt')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Agregar producto -->
                        <div class="space-y-2 self-end">
                            <button wire:click.prevent="addProduct"
                                class="btn btn-outline btn-primary btn-sm normal-case py-5 content-center">
                                Agregar producto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Observación -->
                <div class="space-y-2 mt-5">
                    <x-form.label for="observation" :value="__('Observación')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.eye-question aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="observation" withicon id="observation" class="block w-full"
                            type="text" name="observation" :value="$observation"
                            placeholder="{{ __('Observación') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('observation')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-10">
                    @livewire('entry-guide.table-products')
                </div>
                <div class="flex flex-1 flex-row justify-center gap-5 mt-10">
                    <button class="btn btn-primary" wire:click.prevent="store()">
                        <span wire:loading.@class(['loading loading-spinner'])>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

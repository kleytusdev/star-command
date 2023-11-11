<div>
    <x:modal name="storeSubuser" maxWidth="sm" x-show="modalOpen">
        <form wire:submit.prevent="store">
            @csrf
            <!-- Agrega tus campos de formulario aquí -->
            <div class="grid gap-6">
                <!-- Método de pagos -->
                <div class="space-y-2">
                    <x-form.label for="documentType" :value="__('Método de pago')" />
                    <select
                        class="form-control border-gray-400 rounded-md focus:border-gray-400
                        focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                        dark:text-gray-300 p-2"
                        id="documentType" name="documentType" wire:model="documentType">
                        <option value="">Seleccione un método de pago</option>
                        @foreach ($documentTypes as $documentType)
                            <option class="font-nunito" value="{{ $documentType->value }}">
                                {{ $documentType->value }}
                            </option>
                        @endForeach
                    </select>
                    @error('paymentMethod')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Nombre -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Nombre')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="name" withicon id="name" class="block w-full" type="text"
                            name="name" :value="old('name')" autofocus placeholder="{{ __('Name') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
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
        x-on:click="$dispatch('open-modal', { name: 'storeSubuser' })">Crear
        subusuario</button>
</div>

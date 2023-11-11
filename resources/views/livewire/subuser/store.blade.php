<div>
    <x:modal name="storeSubuser" maxWidth="sm" x-show="modalOpen">
        <form wire:submit.prevent="store">
            @csrf
            <!-- Agrega tus campos de formulario aquí -->
            <div class="grid gap-6">
                <!-- DNI -->
                <div class="space-y-2">
                    <x-form.label for="dni" :value="__('DNI')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.document aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="dni" withicon id="DNI" class="block w-full" type="text" name="dni"
                            :value="old('dni')" required autofocus placeholder="{{ __('DNI') }}" maxlength="8"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        />
                    </x-form.input-with-icon-wrapper>
                    @error('dni')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nombres -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Nombre')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="name" withicon id="name" class="block w-full" type="text"
                            name="name" :value="old('name')" autofocus placeholder="{{ __('Nombre') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Apellido Paterno -->
                <div class="space-y-2">
                    <x-form.label for="paternal_surname" :value="__('Apellido Paterno')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="paternal_surname" withicon id="paternal_surname" class="block w-full" type="text"
                            name="paternal_surname" :value="old('paternal_surname')" autofocus placeholder="{{ __('Apellido Paterno') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('paternal_surname')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Apellido Materno -->
                <div class="space-y-2">
                    <x-form.label for="paternal_surname" :value="__('Apellido Materno')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="maternal_surname" withicon id="maternal_surname" class="block w-full" type="text"
                            name="maternal_surname" :value="old('maternal_surname')" autofocus placeholder="{{ __('Apellido Materno') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('maternal_surname')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Número de celular -->
                <div class="space-y-2">
                    <x-form.label for="phoneNumber" :value="__('Número de celular')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.phone aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input wire:model="phoneNumber" withicon id="phoneNumber" class="block w-full" type="text"
                            name="phoneNumber" :value="old('phoneNumber')" required placeholder="{{ __('Número de celular') }}" maxlength='9'
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

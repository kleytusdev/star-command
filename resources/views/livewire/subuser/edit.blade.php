@props(['subuser'])
<div>
    <x:modal :name="'editSubuser-' . $subuser->id" maxWidth="lg" x-show="modalOpen">
        <form wire:submit.prevent="update">
            @csrf
            <!-- Agrega tus campos de formulario aquí -->
            <div class="grid gap-6">
                <!-- Role -->
                <div class="space-y-2">
                    <x-form.label for="role" :value="__('Rol')" />
                    <select
                        class="w-full form-control border-gray-400 rounded-md focus:border-gray-400
                        focus:ring-primary dark:border-gray-500 dark:bg-dark-eval-1
                        dark:text-gray-300 p-2"
                        id="role" name="role" wire:model="role">
                        <option value="">Seleccione un rol</option>
                        <option class="font-nunito" value="Vendedor">Vendedor</option>
                        <option class="font-nunito" value="Almacenista">Almacenista</option>
                    </select>
                    @error('role')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- DNI -->
                <div class="space-y-2">
                    <x-form.label for="dni" :value="__('DNI')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.document aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="dni" withicon id="dni" class="block w-full" type="text" name="dni"
                            :value="old('dni')" required disabled autofocus placeholder="{{ __('DNI') }}" maxlength="8"
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
                        <x-form.input wire:model="name" withicon disabled id="name" class="block w-full" type="text"
                            name="name" :value="old('name')" autofocus placeholder="{{ __('Nombre') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Apellido Paterno -->
                <div class="space-y-2">
                    <x-form.label for="paternalSurname" :value="__('Apellido Paterno')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="paternalSurname" disabled withicon id="paternalSurname" class="block w-full" type="text"
                            name="paternalSurname" :value="old('paternalSurname')" autofocus placeholder="{{ __('Apellido Paterno') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('paternalSurname')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Apellido Materno -->
                <div class="space-y-2">
                    <x-form.label for="maternalSurname" :value="__('Apellido Materno')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="maternalSurname" disabled withicon id="maternalSurname" class="block w-full" type="text"
                            name="maternalSurname" :value="old('maternalSurname')" autofocus placeholder="{{ __('Apellido Materno') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('maternalSurname')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Correo -->
                <div class="space-y-2">
                    <x-form.label for="email" :value="__('Correo')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="email" withicon id="email" class="block w-full" type="text"
                            name="email" :value="old('email')" autofocus placeholder="{{ __('Correo') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="space-y-2">
                    <x-form.label for="password" :value="__('Contraseña')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="password" withicon id="password" class="block w-full" type="password"
                            name="password" :value="old('password')" autofocus placeholder="{{ __('Contraseña') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirmar contraseña -->
                <div class="space-y-2">
                    <x-form.label for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="password_confirmation" withicon id="password_confirmation" class="block w-full" type="password"
                            name="password_confirmation" :value="old('password_confirmation')" autofocus placeholder="{{ __('Confirmar contraseña') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('password_confirmation')
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
                <div class="flex justify-center avatar">
                    <div class="w-[10vw] mask mask-squircle">
                        @if (!$photoUri)
                            <img src="{{ asset('storage/users/' . $subuser->photoUri ) }}">
                        @endif
                        @if ($photoUri)
                            <img src="{{ $photoUri->temporaryUrl() }}">
                        @endif
                    </div>
                  </div>
            </div>
            <div class="flex flex-1 flex-row justify-center gap-5 mt-10">
                <button class="btn btn-outline btn-primary" x-on:click="$dispatch('close-modal')" type="button">Cerrar</button>
                <button class="btn btn-primary disabled:opacity-20" wire:click='update' wire:loading.attr="disabled" wire:target="update, photoUri">
                    Guardar
                </button>
            </div>
        </form>
    </x:modal>
    <button
        class="btn btn-outline btn-primary btn-xs normal-case"
        x-on:click="$dispatch('open-modal', { name: 'editSubuser-{{ $subuser->id }}' })">Editar</button>
</div>

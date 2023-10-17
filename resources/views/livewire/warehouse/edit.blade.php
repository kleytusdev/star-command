@props(['warehouse'])
<div>
    <x:modal :name="'editWarehouse-' . $warehouse->id" maxWidth="sm" x-show="modalOpen">
        <form wire:submit.prevent="update">
            @csrf
            <!-- Campos del formulario -->
            <div class="grid gap-6">
                <!-- Nombre -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Nombre')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input wire:model="name" withicon id="name" class="block w-full" type="text"
                            name="name" autofocus placeholder="{{ __('Name') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Dirección -->
                <div class="space-y-2">
                    <x-form.label for="address" :value="__('Dirección')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.map aria-hidden="true" class="w-5 h-5 text-primary" />
                        </x-slot>
                        <x-form.input wire:model="address" withicon id="address" class="block w-full" type="text"
                            name="address" autofocus placeholder="{{ __('Address') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('address')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="flex flex-1 flex-row justify-center gap-5 mt-10">
                <button class="btn btn-outline btn-primary" x-on:click="$dispatch('close-modal')"
                    type="button">Cerrar</button>
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </x:modal>
    <button
        class="pointer-events-auto ml-4 flex-none rounded-md px-2 py-[0.3125rem] font-medium text-slate-700 dark:text-slate-200 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 dark:hover:bg-dark-eval-3"
        x-on:click="$dispatch('open-modal', { name: 'editWarehouse-{{ $warehouse->id }}' })">Editar</button>
</div>

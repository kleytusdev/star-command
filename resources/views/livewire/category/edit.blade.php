@props(['category'])
<div>
    <x:modal :name="'editCategory-' . $category->id" maxWidth="sm" x-show="modalOpen">
        <form wire:submit.prevent="update">
            @csrf
            <!-- Agrega tus campos de formulario aquí -->
            <div class="grid gap-6">
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
                <div class="flex justify-center avatar">
                    <div class="w-[10vw] mask mask-squircle">
                        @if (!$photoUri)
                            <img src="{{ asset('storage/categories/' . $category->photo_uri ) }}">
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
        class="pointer-events-auto flex-none rounded-md px-2 py-[0.3125rem] font-medium text-slate-700 dark:text-slate-200 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 dark:hover:bg-dark-eval-3"
        x-on:click="$dispatch('open-modal', { name: 'editCategory-{{ $category->id }}' })">Editar</button>
</div>

<div>
    <x:modal name="test" title="title">
        <x-slot:body>
            <p>test</p>
        </x-slot:body>
        {{-- <form enctype="multipart/form-data" method="post" action="{{ route('categories.store') }}">
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
                        <x-form.input withicon id="name" class="block w-full" type="text" name="name"
                            :value="old('name')" autofocus placeholder="{{ __('Name') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Foto -->
                <div class="space-y-2">
                    <x-form.label for="uri_photo" :value="__('Foto')" />
                    <input id="uri_photo" name="uri_photo" type="file"
                        class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                </div>
            </div>
            <div class="flex flex-1 flex-row justify-center gap-5 mt-5">
                <button class="btn" @click="modelOpen = false" type="button">Cerrar</button>
                <button class="btn" wire:click.prevent="store()" type="submit">Registrar</button>
            </div>
        </form> --}}
    </x:modal>
    <button class="btn btn-outline btn-primary" x-on:click="$dispatch('open-modal', { name: 'test' })">Primary</button>
</div>

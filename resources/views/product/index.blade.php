<x-app-layout>
    <!-- Navbar -->
    <x-navbar title="Productos" />
    <div class="flex-1 flex flex-col gap-5 h-[90%]">
        <!-- Open the modal -->
        <button class="btn bg-dark-eval-1 w-[10%]" onclick="my_modal_5.showModal()">NUEVO</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <form method="post" action="{{ route('product.store') }}">
                    @csrf
                    <!-- Agrega tus campos de formulario aquí -->
                    <div class="grid gap-6">
                        <!-- Nombre -->
                        <div class="space-y-2">
                            <x-form.label
                                for="name"
                                :value="__('Name')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="name"
                                    class="block w-full"
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    placeholder="{{ __('Name') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                        <!-- Precio -->
                        <div class="space-y-2">
                            <x-form.label
                                for="price"
                                :value="__('Precio')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.dollar-minimalistic aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="price"
                                    class="block w-full"
                                    type="text"
                                    name="price"
                                    :value="old('price')"
                                    required
                                    placeholder="{{ __('Precio') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                        <!-- Marca -->
                        <div class="space-y-2">
                            <x-form.label
                                for="brand"
                                :value="__('Marca')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.brand aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="brand"
                                    class="block w-full"
                                    type="text"
                                    name="brand"
                                    :value="old('brand')"
                                    required
                                    placeholder="{{ __('Marca') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                        <!-- Modelo -->
                        <div class="space-y-2">
                            <x-form.label
                                for="model"
                                :value="__('Modelo')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.model aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="model"
                                    class="block w-full"
                                    type="text"
                                    name="model"
                                    :value="old('model')"
                                    required
                                    placeholder="{{ __('Modelo') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                        <!-- Stock -->
                        <div class="space-y-2">
                            <x-form.label
                                for="stock"
                                :value="__('Stock')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-icons.stock aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="stock"
                                    class="block w-full"
                                    type="text"
                                    name="stock"
                                    :value="old('stock')"
                                    required
                                    placeholder="{{ __('Stock') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>
                    </div>
                    <div class="modal-action">
                        <div class="flex flex-1 flex-row justify-center gap-5">
                            <button class="btn" type="button" onclick="my_modal_5.close()">Cerrar</button>
                            <button class="btn" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </dialog>

        <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-7">
            <x:table-products />
        </div>
    </div>
</x-app-layout>

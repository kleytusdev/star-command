<x-app-layout>
    <!-- Navbar -->
    <x-navbar title="Categorías" />
    <div class="flex-1 flex flex-col gap-5 h-[90%]">
        <!-- Open the modal -->
        <button class="btn bg-dark-eval-1 w-[10%]" onclick="my_modal_5.showModal()">NUEVO</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <form method="post" action="{{ route('category.store') }}">
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
            <x-table-categories :categories="$categories" />
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <!-- Navbar -->
    <x-navbar title="Categorías" />
    <div class="flex-1 flex flex-col gap-5 h-[90%]">
        <!-- Open the modal using ID.showModal() method -->
        <button class="btn bg-dark-eval-1 w-[15%]" onclick="my_modal_5.showModal()">Crear categoría</button>
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
            </div>
        </div>
        </dialog>
        <div class="flex-1 flex flex-col p-6 overflow-hidden bg-white rounded-xl dark:bg-dark-eval-1 gap-7">
            <x:table-products />
        </div>
    </div>
</x-app-layout>

<form wire:submit.prevent="destroy">
    @csrf
    <button
        class="btn btn-outline btn-error btn-xs normal-case"
        type="submit">
        Borrar
    </button>
</form>

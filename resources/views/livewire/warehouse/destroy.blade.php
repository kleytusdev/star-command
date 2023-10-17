<form wire:submit.prevent="destroy">
    @csrf
    <button
        class="pointer-events-auto ml-4 flex-none rounded-md px-2 py-[0.3125rem] font-medium text-slate-700 dark:text-slate-200 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 dark:hover:bg-dark-eval-3"
        type="submit">
        Borrar
    </button>
</form>

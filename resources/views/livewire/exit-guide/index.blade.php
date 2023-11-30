<div class="flex flex-1 flex-col h-[100%]">
    <!-- Navbar -->
    <x-navbar title="Guía de salidas" />
    <div class="flex-1 flex gap-5 flex-row">
        <div class="flex-1 p-6 bg-white rounded-xl dark:bg-dark-eval-0 overflow-y-auto">
            @livewire('entry-guide.table-entry-guides')
        </div>
    </div>
</div>

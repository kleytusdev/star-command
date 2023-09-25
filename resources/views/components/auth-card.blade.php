<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <div  class="flex flex-1 flex-col justify-center items-center gap-3">
        <a href="/">
            <x-application-logo class="w-20 h-20" />
        </a>
        <h1 class="text-3xl font-semibold">¡Listo para empezar!</h1>

    </div>

    <div class="w-full px-6 py-4 my-6 overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</main>

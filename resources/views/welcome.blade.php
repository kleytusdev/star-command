@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen selection:bg-red-500 selection:text-white"
    style="background:#fff;">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-6 p-6 flex flex-row justify-between w-[85%] items-center">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-500 hover:text-gray-900 dark:text-black-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
            @else
            <div class="flex flex-row gap-3 items-center">
                <img class="w-10" src="{!! asset('img/iconSchool.png') !!}" />
                <p class="font-semibold text-lg text-gray-700">Las Maravillas del Perú</p>
            </div>
            <div class="flex gap-20 mr-[6vw]">
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-500 hover:text-gray-900 dark:text-black-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-500 hover:text-gray-900 dark:text-black-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Portal</a>
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-500 hover:text-gray-900 dark:text-black-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Contáctanos</a>
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-500 hover:text-gray-900 dark:text-black-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Únete</a>
            </div>
            @endauth
        </div>
        <div class="sm:fixed sm:top-40 w-[100%] items-center flex flex-row">
            <div class="sm:fixed sm:top-40">
                <img class="w-[3vw]" src="{!! asset('img/element.png') !!}" />
            </div>
            <main class="mx-[9%] w-[100%] flex flex-row items-center">
                <div class="w-[30%] h-[35vw] justify-center flex flex-col">
                    <h1 class="text-5xl font-semibold mb-8">Formando futuros brillantes</h1>
                    <p class="text-gray-400 font-normal mb-8">Fusionamos la tradición con la innovación para ofrecer una educación que prepara a los estudiantes para los desafíos del mundo moderno.</p>
                    <div>
                        <button class="text-white rounded-full py-[0.6vw] px-[1.8vw] gradient-blue-y">Consultar ahora</button>
                    </div>
                </div>
                <div class="flex justify-end mr-[3vw] w-[90%]">
                    <img class="w-[35vw]" src="{!! asset('img/studentsDiscussionTogether.svg') !!}" />
                </div>
            </main>
        </div>
    @endif
</div>

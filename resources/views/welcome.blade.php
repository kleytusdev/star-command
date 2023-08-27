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
                    <p class="text-gray-400 font-normal mb-8">Fusionamos la tradición con la innovación para ofrecer una
                        educación que prepara a los estudiantes para los desafíos del mundo moderno.</p>
                    <div>
                        <button class="text-white rounded-full py-[0.6vw] px-[1.8vw] gradient-blue-y">Consultar
                            ahora</button>
                    </div>
                </div>
                <div class="flex justify-end mr-[3vw] w-[90%]">
                    <img class="w-[35vw]" src="{!! asset('img/studentsDiscussionTogether.svg') !!}" />
                </div>
            </main>
        </div>
        <div>
            <button id="showIframeButton" class="absolute bottom-10 right-10">
                <div class="w-[3vw] h-[3vw] gradient-blue-y rounded-full flex items-center justify-center">
                    <img class="w-[1.5vw] text-center" src="{!! asset('svg/robot-svgrepo-com.svg') !!}" />
                </div>
            </button>

            <div id="iframeContainer"
                class="fixed bottom-0 right-0 p-4 w-[400px] h-[600px] bg-white shadow-lg overflow-hidden transform translate-x-full"
                style="transition: transform 0.3s ease-in-out;">
                <iframe id="iframe"
                    src='https://webchat.botframework.com/embed/az-bot-text-bot?s=EPzt_SK5uuc.3HAczSwkCj0Zb3MrSTEfyRQE63A4gxYR7efKfsZLqjE'
                    style='width: 100%; height: 100%;'></iframe>
                <button id="closeIframeButton" class="absolute top-1 left-1 rounded-full"
                    style="display: none;">
                    <img class="w-[1.2vw]" src="{!! asset('svg/square-rounded-x.svg') !!}" />
                </button>
            </div>
        </div>

        <script>
            const showIframeButton = document.getElementById('showIframeButton');
            const closeIframeButton = document.getElementById('closeIframeButton');
            const iframeContainer = document.getElementById('iframeContainer');

            showIframeButton.addEventListener('click', () => {
                iframeContainer.style.transform = 'translateX(0)';
                closeIframeButton.style.display = 'block';
            });

            closeIframeButton.addEventListener('click', () => {
                iframeContainer.style.transform = 'translateX(100%)';
                closeIframeButton.style.display = 'none';
            });
        </script>
    @endif
</div>

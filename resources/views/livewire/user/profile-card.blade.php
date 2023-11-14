<div class="flex flex-col">
    <div class="relative flex-col items-center rounded-[10px] bg-white dark:bg-dark-eval-0 dark:text-white">
        <div class="relative flex h-32 w-full justify-center rounded-xl bg-cover" >
            <img src='https://horizon-tailwind-react-git-tailwind-components-horizon-ui.vercel.app/static/media/banner.ef572d78f29b0fee0a09.png' class="absolute flex h-32 w-full justify-center rounded-xl bg-cover">
            <div class="absolute -bottom-12 flex h-[87px] w-[87px] items-center justify-center rounded-full border-[4px] border-white dark:border-dark-eval-1 bg-pink-400 dark:!border-navy-700">
                <img class="h-full w-full rounded-full" src='https://cdn.discordapp.com/attachments/920362745231192114/1152767754303189052/365437934_223379340699400_3616346069001445058_n.jpeg' alt="" />
            </div>
        </div>
        <div class="mt-16 flex flex-col items-center">
            <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                {{ $user->person?->name }}
            </h4>
            <p class="text-base font-normal text-gray-400">Gerente General</p>
        </div>
    </div>
</div>

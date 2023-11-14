<table class="w-[100%] overflow-x-auto table">
    <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
        <tr class="border-none">
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subusers as $subuser)
            <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                <th scope="row" class="flex items-center text-gray-900 dark:text-white">
                    <div class="avatar">
                        <div class="w-12 mask mask-squircle">
                            <img src={{ asset('storage/users/' . $subuser->photoUri) }} />
                        </div>
                    </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{ $subuser->name }}</div>
                        <div class="font-normal text-gray-500">{{ $subuser->email }}</div>
                    </div>
                </th>
                <td>{{ $subuser->role }}</td>
                <td>
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-p-green mr-2"></div> {{ $subuser->active }}
                    </div>
                </td>
                <td>
                    <div class="flex flex-col gap-3">
                        @livewire('subuser.edit', ['subuser' => $subuser])
                        @livewire('subuser.destroy', ['subuser' => $subuser])
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

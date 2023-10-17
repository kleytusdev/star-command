@props(['categories'])
<table class="w-[100%] text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-dark-eval-1 dark:text-gray-400">
        <tr>
            <th scope="col" class="pb-3">
                ID
            </th>
            <th scope="col" class="pb-3">
                Imagen
            </th>
            <th scope="col" class="pb-3">
                Nombre
            </th>
            <th scope="col" class="pb-3">
                Fecha de Creación
            </th>
            <th scope="col" class="pb-3">
                Fecha de Actualización
            </th>
            <th scope="col" class="pb-3">
                Acción
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr
                class="bg-white border-b dark:bg-dark-eval-1 dark:border-dark-eval-3 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="py-4">{{ $category->id }}</th>
                <td>
                    <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('storage/categories/' . $category->photo_uri ) }}">
                </td>
                <td class="py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="text-base font-semibold">{{ $category->name }}</div>
                </td>
                <td class="py-4">{{ $category->created_at }}</td>
                <td class="py-4">{{ $category->updated_at }}</td>
                <td class="flex flex-col py-4 gap-2">
                    <!-- Modal toggle -->
                   @livewire('category.edit', ['category' => $category])
                   @livewire('category.destroy', ['category' => $category])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

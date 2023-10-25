@props(['categories'])
<div class="w-[100%] overflow-x-auto">
    <table class="table">
        <thead class="text-sm text-gray-700 bg-white dark:bg-dark-eval-0 dark:text-gray-400">
            <tr class="border-none">
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="bg-white border-b dark:bg-dark-eval-0 dark:border-dark-eval-1 border-gray-100">
                    <th class="py-4">{{ $category->id }}</th>
                    <td>
                        <div class="avatar">
                            <div class="w-12 mask mask-squircle">
                                <img src="{{ asset('storage/categories/' . $category->photo_uri) }}" />
                            </div>
                        </div>
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td class="flex flex-col py-4 gap-2">
                        <!-- Modal toggle -->
                        @livewire('category.edit', ['category' => $category])
                        @livewire('category.destroy', ['category' => $category])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

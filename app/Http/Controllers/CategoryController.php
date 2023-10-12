<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Enums\CategoryStatusEnum;
use App\Http\Requests\Category\CategoryStoreRequest;

class CategoryController extends Controller
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();;
    }

    public function index()
    {
        return view('category.index', ['categories' => $this->categories]);
    }

    public function store(CategoryStoreRequest $request)
    {
        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($request->hasFile('uri_photo')) {
            $path = $request->file('uri_photo')->store('public/categories');
            $fullPath = asset(str_replace('public', 'storage', $path));
        }

        Category::create([
            'name' => $request->name,
            'status' => CategoryStatusEnum::ACTIVE,
            'uri_photo' => $fullPath ?? null
        ]);

        // return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }

        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Registro eliminado correctamente.'], 200);
    }
}

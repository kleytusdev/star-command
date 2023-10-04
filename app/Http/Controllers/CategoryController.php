<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function getCategories()
    {
        return response()->json(Category::all(), 200);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }

        return response()->json($category, 200);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        if (is_null($category)) {
            return response()->json(['message' => 'Ocurrió un error inesperado al guardar la categoría.'], 404);
        }

        return response()->json($category, 200);
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

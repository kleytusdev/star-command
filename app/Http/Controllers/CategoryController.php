<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Enums\CategoryStatusEnum;
use App\Http\Requests\Category\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'status' => CategoryStatusEnum::ACTIVE
        ]);

        return view('category.index');
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

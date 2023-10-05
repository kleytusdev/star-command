<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Enums\ProductStatusEnum;
use App\Http\Requests\Product\ProductStoreRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'brand' => $request->brand,
            'model' => $request->model,
            'stock' => $request->stock,
            'status' => ProductStatusEnum::ACTIVE
        ]);

        // return view('category.index', compact('category'));
    }
}

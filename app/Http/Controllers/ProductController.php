<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Enums\ProductStatusEnum;
use App\Http\Requests\Product\ProductStoreRequest;

class ProductController extends Controller
{
    public $products;

    public function __construct()
    {
        $this->products = Product::all();
    }

    public function index()
    {
        $warehouses = Warehouse::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();

        return view('product.index', ['warehouses' => $warehouses, 'categories' => $categories, 'products' => $this->products]);
    }

    public function store(ProductStoreRequest $request)
    {
        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($request->hasFile('uri_photo')) {
            $path = $request->file('uri_photo')->store('public/products');
            $fullPath = asset(str_replace('public', 'storage', $path));
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'brand' => $request->brand,
            'model' => $request->model,
            'stock' => $request->stock,
            'status' => ProductStatusEnum::ACTIVE,
            'qr_code' => '123',
            'uri_photo' => $fullPath ?? null,
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
    }
}

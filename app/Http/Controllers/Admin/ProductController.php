<?php

namespace App\Http\Controllers\admin;

use App\Services\ProductsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;
    public function __construct(ProductsService $productsService)
    {
        $this->productService = $productsService;
    }
    public function index()
    {
        $products = $this->productService->getProducts();
        return view("admin.products.index", ["products" => $products]);
    }

    public function create()
    {
        $categories = $this->productService->getCategories();
        return view("admin.products.add", ["categories" => $categories]);
    }

    public function store(ProductRequest $request)
    {

        $create = $this->productService->store($request->all());
        if ($create) {
            return response()->json([
                'status' => true,
                'message' => 'data saved successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something is wrong',
            ]);
        }
    }
    public function category($id)
    {

        $category = $this->productService->getCategory($id);
        return view("admin.products.category", ['category' => $category]);
    }

    public function edit($id)
    {
        $categories = $this->productService->getCategories();
        $product = $this->productService->getProduct($id);
        return view('admin.products.edit', ["product" => $product, "categories" => $categories]);
    }

    public function update(ProductRequest $request)
    {
        $update = $this->productService->update($request->id, $request->all());

        if ($update) {
            return response()->json([
                'status' => true,
                'message' => 'data updated successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something is wrong',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $delete = $this->productService->destroy($request->id);
        if($delete)
        {
            return response()->json([
                'status'=> true,
                'message' => 'data deleted successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something is wrong',
            ]);
        }
    }
}

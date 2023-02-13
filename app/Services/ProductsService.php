<?php

namespace App\Services;

use App\Models\Categories;
use App\Models\Product;
use App\Traits\SaveImages;

class ProductsService
{
    use SaveImages;

    public function getProducts()
    {
        $products = Product::with('category')->paginate(10);
        return $products;
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }
    public function getCategories()
    {
        $categories = Categories::all();
        return $categories;
    }
    public function getCategory($id)
    {
        $category = Categories::find($id);
        return $category;
    }

    public function store($data)
    {
        $create = Product::create($data);
        return $create;
    }

    public function update($id, $data)
    {
        $product = $this->getProduct($id);
        $update = $product->update($data);
        return $update;
    }

    public function destroy($id)
    {
        $product = $this->getProduct($id);
        $delete = $product->delete();
        return $delete;
    }
}

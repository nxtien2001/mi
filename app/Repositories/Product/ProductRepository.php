<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return $product = Product::orderBy('id', 'desc')->get();
        foreach ($product as $item) {
            $item->category->name;
        }
    }
    public function checkId($id)
    {
        return $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(['message' => 'Không tồn tại sản phẩm này'], 400);
        };
    }
    public function create(array $product)
    {
        return Product::create($product);
    }
    public function update($id, array $product)
    {
        return $product = Product::find($id)->update($product);
        if (is_null($product)) {
            return response()->json(['message' => 'Không tồn tại sản phẩm này'], 400);
        };
    }
    public function delete($id)
    {
        return Product::find($id)->delete();
    }
}

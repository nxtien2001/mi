<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::orderBy('id', 'desc')->get();
    }
    public function checkId($id)
    {
        return $category = Category::find($id);
        if (is_null($category)) {
            return response()->json(['message' => 'Không tồn tại danh mục này'], 400);
        };
    }
    public function create(array $category)
    {
        return Category::create($category);
    }
    public function update($id, array $category)
    {
        return $category = Category::find($id)->update($category);
        if (is_null($category)) {
            return response()->json(['message' => 'Không tồn tại danh mục này'], 400);
        };
    }
    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}

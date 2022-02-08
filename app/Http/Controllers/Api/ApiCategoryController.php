<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Repositories\Category\CategoryRepository;

class ApiCategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $category = $this->categoryRepository->all();
        return response()->json($category);
    }
    public function getId($id)
    {
        $category = $this->categoryRepository->checkId($id);
        return response()->json($category, 200);
    }
    public function create(Request $request)
    {
        $message = [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'image.required' => 'Không được để trống trường này!',
            'image.mimes' => 'Định dạng ảnh không hợp lệ!',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ], $message);
        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 404);
        }
        if ($request->hasFile('image')) {
            $url = env('APP_URL');

            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs(('public/categories'), $file_name);
            $file_name = $url . 'storage/categories/' . $file_name;
        }
        $category = $this->categoryRepository->create([
            'name' => $request->name,
            'image' => $file_name
        ]);
        return response()->json([
            $category,
            'message' => 'Thêm danh mục thành công!'
        ], 200);
    }
    public function edit(Request $request, $id)
    {
        $category = $this->categoryRepository->checkId($id);
        if (is_null($category)) {
            return response()->json(['message' => 'Không tồn tại danh mục này!'], 404);
        }
        $message = [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'image.required' => 'Không được để trống trường này!',
            'image.mimes' => 'Định dạng ảnh không hợp lệ!',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $category->id,
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ], $message);
        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 404);
        }
        $file_name = $category->image;
        if ($request->hasFile('image')) {
            $url = env('APP_URL');
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs(('public/categories'), $file_name);
            $file_name = $url . 'storage/categories/' . $file_name;
        }
        $category = $this->categoryRepository->update($id, [
            'name' => $request->name,
            'image' => $file_name
        ]);
        return response()->json(['message' => 'Cập nhật danh mục thành công!'], 200);
    }
    public function delete($id)
    {
        $category = $this->categoryRepository->checkId($id);
        if (isset($category)) {
            $this->categoryRepository->delete($id);
            return response()->json(['message' => 'Xóa danh mục thành công!'], 200);
        }
        return response()->json(['message' => 'Không tồn tại danh mục này!'], 404);
    }
}

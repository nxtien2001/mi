<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductAttr;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $product = $this->productRepository->all();
        return response()->json([
            $product
        ], 200);
    }
    public function show($id)
    {
        $product = $this->productRepository->checkId($id);
        return response()->json([
            'product' => $product
        ], 200);
    }
    public function create(Request $request)
    {
        $message = [
            'name.required' => 'Tên sản phẩm không được để trống!',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'image.required' => 'Không được để trống trường này!',
            'image.mimes' => 'Định dạng ảnh không hợp lệ!',
            'shoe_code.required' => 'Mã sản phẩm không được để trống!',
            'shoe_code.unique' => 'Mã sản phẩm đã tồn tại',
            'category_id.required' => 'Danh mục không được để trống!',
            'suitable_gender.required' => 'Không được để trống trường này!',
            'price.required' => 'Không được để trống trường này!',
            'price.alpha_num' => 'Giá phải là số!',
        ];
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'image' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
            'shoe_code' => 'required|unique:products',
            'category_id' => 'required',
            'suitable_gender' => 'required',
            'price' => 'required|alpha_num',
        ], $message);
        if ($validate->fails()) {
            return response()->json(['error' => $validate->errors()], 404);
        }
        $attribute = DB::table('attributes')->select('name')->get();
        $category = Category::find($request->category_id);
        if (is_null($category)) {
            return response()->json([
                'message' => 'Không tồn tại danh mục này'
            ], 400);
        }
        if ($request->hasFile('image')) {
            $url = env('APP_URL');
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs(('public/products'), $file_name);
            $file_name = $url . 'storage/products/' . $file_name;
        }
        $product = $this->productRepository->create([
            'name' => $request->name,
            'shoe_code' => $request->shoe_code,
            'category_id' => $request->category_id,
            'suitable_gender' => $request->suitable_gender,
            'price' => $request->price,
            'status' => $request->status,
            'image' => $file_name,
        ]);
        foreach ($request->size as $value) {
            $product_attrs = ProductAttr::create(
                [
                    'product_id' => $product->id,
                    'attributes_id' => $value['attributes_id'],
                    'quantity' => $value['quantity'],
                ]
            );
        };
        return response()->json([
            'message' => 'Thêm sản phẩm thành công!',
            'product' => $product,
            'attributes' => $product_attrs
        ], 200);
    }
    public function edit(Request $request, $id)
    {
        $product = $this->productRepository->checkId($id);
        if (is_null($product)) {
            return response()->json(['message' => 'Không tồn tại danh mục này!'], 404);
        }
        $file_name = $product->image;
        if ($request->hasFile('image')) {
            $url = env('APP_URL');
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs(('public/categories'), $file_name);
            $file_name = $url . 'storage/categories/' . $file_name;
        }
        $product = $this->productRepository->update($id, [
            'name' => $request->name,
            'shoe_code' => $request->shoe_code,
            'category_id' => $request->category_id,
            'suitable_gender' => $request->suitable_gender,
            'price' => $request->price,
            'status' => $request->status,
            'image' => $file_name,
        ]);
        if ($product) {
            foreach ($request->product_attrs as $value) {
                $product_attrs = ProductAttr::create(
                    [
                        'product_id' => $id,
                        'attributes_id' => $value['attributes_id'],
                        'quantity' => $value['quantity'],
                    ]
                );
            };
        }
        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công!',
            'product' => $product,
            'attributes' => $product_attrs
        ], 200);
    }
    // public function edit(Request $request, $id)
    // {
    //     $product = $this->productRepository->checkId($id);
    //     if (is_null($product)) {
    //         return response()->json(['message' => 'Không tồn tại sản phẩm này!'], 404);
    //     }
    //     $message = [
    //         'name.required' => 'Tên sản phẩm không được để trống!',
    //         'name.unique' => 'Tên sản phẩm đã tồn tại',
    //         'image.required' => 'Không được để trống trường này!',
    //         'image.mimes' => 'Định dạng ảnh không hợp lệ!',
    //         'shoe_code.required' => 'Mã sản phẩm không được để trống!',
    //         'shoe_code.unique' => 'Mã sản phẩm đã tồn tại',
    //         'category_id.required' => 'Danh mục không được để trống!',
    //         'suitable_gender.required' => 'Không được để trống trường này!',
    //         'price.required' => 'Không được để trống trường này!',
    //         'price.alpha_num' => 'Giá phải là số!',
    //     ];
    //     $validate = Validator::make($request->all(), [
    //         'name' => 'required|unique:products' . $product->id,
    //         'image' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
    //         'shoe_code' => 'required|unique:products',
    //         'category_id' => 'required',
    //         'suitable_gender' => 'required',
    //         'price' => 'required|alpha_num',
    //     ], $message);
    //     if ($validate->fails()) {
    //         return response()->json(['error' => $validate->errors()], 404);
    //     }
    //     $file_name = $product->image;
    //     if ($request->hasFile('image')) {
    //         $url = env('APP_URL');
    //         $file = $request->file('image');
    //         $file_name = $file->getClientOriginalName();
    //         $file->storeAs(('public/products'), $file_name);
    //         $file_name = $url . 'storage/products/' . $file_name;
    //     }

    //     $product = $this->productRepository->update($id, [
    //         'name' => $request->name,
    //         'shoe_code' => $request->shoe_code,
    //         'category_id' => $request->category_id,
    //         'suitable_gender' => $request->suitable_gender,
    //         'price' => $request->price,
    //         'status' => $request->status,
    //         'image' => $file_name,
    //     ]);
    //     if ($product) {
    //         foreach ($request->product_attrs as $value) {
    //             $product_attrs = ProductAttr::create(
    //                 [
    //                     'product_id' => $id,
    //                     'attributes_id' => $value['attributes_id'],
    //                     'quantity' => $value['quantity'],
    //                 ]
    //             );
    //         };
    //     }
    //     return response()->json([
    //         'message' => 'Cập nhật sản phẩm thành công!',
    //         'product' => $product,
    //         'attributes' => $product_attrs
    //     ], 200);
    // }
    public function delete($id)
    {
        $product = $this->productRepository->checkId($id);
        if (isset($product)) {
            $product = $this->productRepository->delete($id);
            return response()->json(['message' => 'Xóa sản phẩm thành công!'], 200);
        }
        return response()->json(['message' => 'Không tồn sản phẩm này'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // product list
    public function list()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->where('products.name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(3);
        $products->appends(request()->all());
        return view('admin.product.productList', compact('products'));
    }

    // direct product create page
    public function createPage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.create', compact('categories'));
    }

    // create product
    public function create(Request $request)
    {
        $this->productValidationCheck($request, "create");
        $data = $this->requestProductInfo($request);

        $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public', $fileName);
        $data['image'] = $fileName;

        Product::create($data);
        return redirect()->route('product#list');
    }

    // delete product
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess' => 'Product Delete Success...']);
    }

    // edit product
    public function edit($id)
    {
        $product = Product::select('products.*', 'categories.name as category_name')
        ->leftJoin('categories', 'products.category_id', 'categories.id')
        ->where('products.id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    // direct product update page
    public function updatePage($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.update', compact('product', 'category'));
    }

    //update product
    public function update(Request $request)
    {
        $this->productValidationCheck($request, "update");
        $data = $this->requestProductInfo($request);

        if ($request->hasFile('productImage')) {
            $oldImageName = Product::where('id', $request->productId)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        Product::where('id', $request->productId)->update($data);
        return redirect()->route('product#list');
    }

    // request product info
    private function requestProductInfo($request){
        return [
            'category_id' => $request->productCategory,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
            'waiting_time' => $request->productWaitingTime
        ];
    }

    // product validation check
    private function productValidationCheck($request, $action)
    {
        $validationRules = [
            'productName' => 'required|min:5|unique:products,name,' . $request->productId,
            'productCategory' => 'required',
            'productDescription' => 'required|min:10',
            'productPrice' => 'required',
            'productWaitingTime' => 'required',
        ];

        $validationRules['productImage'] = $action == "create" ? 'required|mimes:jpg,jpeg,png,webp|file' : 'mimes:jpg,jpeg,png,webp|file';

        Validator::make($request->all(), $validationRules)->validate();
    }
}

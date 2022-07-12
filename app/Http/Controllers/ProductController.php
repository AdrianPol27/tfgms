<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('admin.product.index', compact('products'));
    }

    public function addProduct()
    {
        return view('admin.product.add');
    }

    public function addProductSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric'
        ]);

        DB::table('products')->insert([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price
        ]);
        return redirect('/products')->with('product_added', 'Product has been added!');
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('product_id', $id)->delete();
        return redirect('/products')->with('product_deleted', 'Product has been deleted!');
    }

    public function viewProduct($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('admin.product.view', compact('product'));
    }

    public function editProduct($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric'
        ]);

        DB::table('products')->where('product_id', $request->product_id)->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price
        ]);
        return redirect('/products')->with('product_updated', 'Product has been updated!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(4);
        return view('products',[
            'products'=>$products
        ]);
    }
    public function saveProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products',
                'price'=>'required',
            ],
            [
                'name.required'=>'Name is required',
                'name.unique'=>'Product Already Exists',
                'price.required'=>'Price is required',
            ],
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success'
        ]);
    }
    // public function editProduct($id){
    //     $product = Product::find($id);
    //     return view('edit-product',[
    //         '$product'=>$product
    //     ]);
    // }
}

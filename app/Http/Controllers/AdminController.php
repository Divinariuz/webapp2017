<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser($id, Request $request){
        $user = User::findOrFail($id);

        $user->email = $request->email;
        $user->admin_flag = $request->admin_flag;
        $user->save();

        \Session::flash('flash_message', 'User successfully edited!');
        return redirect()->route('admin.users');
    }

    public function deleteUser(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        \Session::flash('flash_message', 'User successfully deleted!');
        return redirect()->back();
    }

    public function getProducts(){
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    public function getCreateProduct(){
        return view('admin.create_product');
    }

    public function postCreateProduct(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->imagePath = $request->imagePath;
        $product->save();
        \Session::flash('flash_message', 'Product successfully created!');
        return redirect()->route('admin.products');
    }

    public function editProduct($product_id){
        $product = Product::findOrFail($product_id);
        return view('admin.edit_product', compact('product'));
    }

    public function updateProduct($product_id, Request $request){
        $product = Product::findOrFail($product_id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->imagePath = $request->imagePath;
        $product->save();
        \Session::flash('flash_message', 'Product successfully edited!');
        return redirect()->route('admin.products');
    }

    public function deleteProduct(Request $request){
        $product = Product::findOrFail($request->product_id);
        $product->delete();
        \Session::flash('flash_message', 'Product successfully deleted!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

use Hash;
use Auth;

class VendorController extends Controller
{
    function add_product (Request $request)
    {
        return view('vendor/add_product');
    }

    function add_products(Request $request)
    {
        $name= $request -> get('name');
        $price= $request -> get('price');
        $description= $request -> get('description');
        $image= $request -> get('image');


        Product::create([
            'user_id' => Auth::user() -> id,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image,
            'vendor_id' =>  Auth::user() -> id,
        ]);
        $data =Product::all();
        return view('vendor/add' ,['data' => $data]);
    }

    function show_products(Request $request)
    {
        $data =Product::where('vendor_id',Auth::user() -> id) -> get();
        return view('vendor/add' ,['data' => $data]);
    }


    function show_orders(Request $request)
    {
        $data =Order::where('vendor_id',Auth::user() -> id) -> get();
        return view('vendor/show_orders' ,['data' => $data]);
    }

    function updatedelete(Request $request)
    {
        $id =$request -> get('id');
        $name =$request -> get('name');
        $description =$request -> get('description');
        $price =$request -> get('price');
        if($request -> get('update') == "Update")
        {
            return view('vendor/update_product',['product_id' => $id , 'name' => $name , 'description' => $description , 'price' => $price ]);
        }
        else
            Product::where('product_id', $id) -> delete();

        $data =Product::where('vendor_id',Auth::user() -> id) -> get();
        return view('vendor/add' ,['data' => $data]);

    }

        function update(Request $request)
        {
            $id =$request -> get('id');
            $name =$request -> get('name');
            $price =$request -> get('price');

            Product::where('product_id', $id) -> update([
                'name' => $request['name'],
                'price' => $request['price'],
            ]);
            $data =Product::where('vendor_id',Auth::user() -> id) -> get();
            return view('vendor/add' ,['data' => $data]);
        }
}

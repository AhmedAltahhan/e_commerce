<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Auth;
use Hash;


class UserController extends Controller
{
    function login_index(Request $request)
    {
        return view('login' , ['error' => '']);
    }

    function register_index(Request $request)
    {
        return view('register' , ['error' => '']);
    }

    function login(Request $request)
    {
        $user= User::where('email' , $request['email'])->count();
        if($user==0)
            return view('login',['error' => "This email doesn't exists"]);

        if(Auth::attempt($request -> only('email','password')))
        {
            if(Auth::user() -> role==2)
                return redirect('/welcome');
            else if(Auth::user() -> role==1)
                return redirect('/products');
            else
                return redirect('/products');
        }
        return view('login',['error' => "Invalid Credintials"]);
    }

    function register(Request $request)
    {
        $user= User::where('email' , $request['email'])->count();
        if($user > 0)
            return view('register',['error' => "This email already exists"]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 0,
            'Address' => $request['Address'],
        ]);
        return view('login',['error' => '']);
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    function show_products()
    {
        $data =Product::all();
        return view('client/products' ,['data' => $data]);
    }

    function orders(Request $request)
    {

        $name= $request -> get('name');
        $v= $request -> get('vendor_id');
        $price= $request -> get('price');
        $description= $request -> get('description');

        $total =$price * $description;

        Order::create([
            'user_id' => Auth::user() -> id,
            'name' => $name,
            'description' => $description,
            'total' => $total,
            'vendor_id' => $v,
        ]);
        $data =Product::all();
        return view('client/products' ,['data' => $data]);
    }



}

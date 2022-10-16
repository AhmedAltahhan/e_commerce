<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;


class AdminController extends Controller
{
    function welcome()
    {
        $admin = User::where('role', 2) -> get();
        return view('admin/welcome',['admins' => $admin]);
    }

    function show_add_vendor()
    {
        return view('admin/add_vendor');
    }

    function show_vendor()
    {
        $vendors = User::where('role', 1) -> get();
        return view('admin/show_vendor',['vendors' => $vendors]);
    }

    function add_vendor(Request $request)
    {
        if(!isset($request['name']) || !isset($request['email']) || !isset($request['password']) || !isset($request['Address'])
        || trim($request['name']) == "" || trim($request['email']) == "" || trim($request['password']) == "" || trim($request['Address']) == "")
            return view('admin/add_vendor',['error' => "Insert all the fields"]);

        $name = strtolower(trim($request['name']));
        $email = trim($request['email']);
        $address = $request['Address'];
        $user = User::where('name',$name)-> count();
        if($user > 0)
            return view('admin/add_vendor',['error' => "This user is already exists"]);

        $vendor = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request['password']),
            'role' => 1,
            'Address' => $address,
        ]);
        return view('admin/add_vendor',['success' => "the  doctor added sucessfully"]) ;
    }

    function updatedelete_vendor(Request $request)
    {
        $id =$request -> get('id');
        $name =$request -> get('name');
        $email =$request -> get('email');
        $Address =$request -> get('Address');
        if($request -> get('update') == "Update")
        {
            return view('admin/update_vendor',['id' => $id , 'name' => $name , 'email' => $email , 'Address' => $Address ]);
        }
        else
            User::where('id', $id) -> delete();

        $vendors = User::where('role', 1) -> get();
        return view('admin/show_vendor',['vendors' => $vendors]);
    }

    function update_vendor(Request $request)
    {
        $id =$request -> get('id');
        $name =$request -> get('name');
        $email =$request -> get('email');
        $Address =$request -> get('Address');

        User::where('id', $id) -> update([
            'name' => $request['name'],
            'email' => $request['email'],
            'Address' => $request['Address'],
        ]);
        $vendors = User::where('role', 1) -> get();
        return view('admin/show_vendor',['vendors' => $vendors]);
    }

}

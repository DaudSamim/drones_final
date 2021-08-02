<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;


class VendorRegistrationController extends Controller
{
    public function vendor_register(Request $request)
{

    
    $this->validate($request, [
        'email' => 'required|unique:users',
        'last_name' => 'required',
        'first_name' => 'required',
        'username' => 'required|unique:users',
        'password' => 'min:6|required',
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',

        
        
    ]);
    if($request->file('image')){
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = public_path().'/images/';
        $file->move($path, $filename);

    };


    DB::table('users')->insert([   
       
        'email' => $request->email, 
        'username' => $request->username,
        'password' => bcrypt($request->password), 
        'role'  => '2',
        

       
    ]);    
    $user_id = DB::table('users')->orderBy('id', 'desc')->first();  
    DB::table('vendors')->insert([   
        'first_name' => $request->first_name,
        'user_id' => $user_id->id,
        'last_name' => $request->last_name,
        'display_name' => $request->display_name,
        'description' => $request->description,
        'image' => $filename,
        
        
        
    ]);    

    return redirect('login')->with('success', 'You have Registered Successfully!');
}
}

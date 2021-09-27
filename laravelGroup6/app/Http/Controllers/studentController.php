<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{

    function create (){
        return view('create');
    }


    function store (Request $request){
       $request->validate([
           'name' => 'required | alpha',
           'email' => 'required | email',
           'password' => 'required | min:6',
           'address' => 'required | string | size:10',
           'gender' => 'required',
           'url' => 'required | url'
       ]);
       return view('profile',['data' => $request->except('_token')]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class MyproductController extends Controller
{
    public function myproduct()
    {

        $myproduct = product::all();
        //  print($myproduct);die();

        return view('agent.myproduct',[
            'myproduct' => $myproduct
        ]);
    }
}

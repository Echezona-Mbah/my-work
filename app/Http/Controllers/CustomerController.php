<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function customer()
    {
        // $id = Auth::user()->id;
        // print($id);die();

        return view('agent.customer');
    }


    public function customerRegister(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'shop_num'=> 'required|unique:customers,shop_num',
            'email'=> 'required|email|unique:customers,email'
        ]);

        $id = Auth::user()->id;
             
        $customer = customer::create([
            'name' => $request->input('name'),
            'shop_num' => $request->input('shop_num'),
            'email' => $request->input('email'),
            'user_id' => $id,
            'customer_id' => $this->generateUniqueCode()
        ]);

        return redirect()->back()->with('success', 'customer was successfully add');
      
    }


    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (customer::where("customer_id", "=", $code)->first());
  
        return $code;
    }


    public function seecustomer()
    {
         $id = Auth::user()->id;
         $customer = customer::where('user_id',$id)->get();
        // print($customer);die();

        return view('agent.seecustomer',)->with('customer', $customer);
    }


    //
}

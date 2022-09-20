<?php

namespace App\Http\Controllers;

use App\Models\discount;
use App\Models\product;
use App\Models\sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function sales(Request $request)
    {
        $id=$request->id;
        // print($id);die();
        return view('agent.sales')->with('id', $id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product'=> 'required',
            'quantity'=> 'required',
            'amount'=> 'required'
        ]);
        $customer_id = $request->customer_id;
        $user_id= auth()->user()->id;
       
        $product = product::where('product', '=', $request->product)->first();
        $quantity = $product->quantity;
        $balanced = $quantity - $request->quantity;

        $discounts = discount::where('product', '=', $request->product)->first();
        $discount = $discounts->discount;
        $quantitydd = $discounts->quantity;
        $cal = ($request->amount/100)*5;
        $caitotal = $request->amount - $cal;
        $totaldiscount = $caitotal * $request->quantity;
        $total = $request->amount * $request->quantity;
        // print($request->quantity >= $quantitydd);die();
        // print($customer_id);die();

        if($request->quantity >= $quantity) return redirect()->back()->with('error', "$request->product is less");



        if($request->quantity >= $quantitydd){
            $sales = sales::create([
                'product' => $request->input('product'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('amount'),
                'user_id' => $user_id,
                'name' => $customer_id,
                'total' => $totaldiscount
            ]);  
        }else{
            $sales = sales::create([
                'product' => $request->input('product'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('amount'),
                'user_id' => $user_id,
                'name' => $customer_id,
                'total' => $total
            ]);
    
        }
        $update = product::where('product', $request->product)->first()
                    ->update([
                        'quantity' =>  $balanced
                    ]);
        return redirect('/sales/{{id}}');
    }

    public function Allsales(Request $request)
    {
        $allsales = sales::all();
       
        return view('allsales',[
            'allsales' => $allsales
        ]);
    }


}

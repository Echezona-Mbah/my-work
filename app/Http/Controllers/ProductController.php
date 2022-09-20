<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        return view('product');
    }

    
    public function produtreg(Request $request)
    {
        $request->validate([
            'product'=> 'required',
            'quantity'=> 'required',
            'price'=> 'required'
        ]);
        $total = $request->price * $request->quantity ;
        // $deprice = $request->quantity;
        //  $id = $request->id;
        //  $dd = $request->product;
        //  $discountdit = discount:: where('product', '=', $dd)->first();
        //  $product = $discountdit->product;
        //  $quantity = $discountdit->quantity;
        //  $productddd = $discountdit->discount;
        //  $cal = ($request->price/100)*5;
        //  $caitotal = $request->price - $cal;
        //  $ww = $quantity != $deprice;
        //   print($ww);die();
        
        //  if($deprice >= $quantity){
             
        $product = product::create([
            'product' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $total
        ]);

        return redirect()->back()->with('success', 'product was successfully add');
      } 
   // else{
    //     $product = product::create([
    //         'product' => $request->input('product'),
    //         'quantity' => $request->input('quantity'),
    //         'price' => $request->input('price'),
    //         'user_id' =>  $id,
    //         'total' => $total,
    //         'discount' => 0
    //     ]);
    //    }
      
    
}

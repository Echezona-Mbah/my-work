<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class AllProductController extends Controller
{
    public function allproduct()
    {
        $product = product::all();
        // print($product);die();

        return view('allproduct',[
            'product' => $product
        ]);
    }

    public function destroy($id)
{
     $product = product::find($id);
     $product->delete();
     return redirect()->back()->with('success', 'delete successful!');
}



}

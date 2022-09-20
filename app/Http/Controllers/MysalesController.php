<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class MysalesController extends Controller
{
    public function mysales()
    {

        $mysales = Auth::user()->sales;
        // print($mysales);die();

        return view('agent.mysales',[
            'mysales' => $mysales
        ]);
    }


    /**
     * Change Status Function
     *
     * @param [string] $id
     * @return void
     */
    public function changeStatus(string $id)
    {
        $sales = sales::find($id);

        if(!$sales) return redirect()->back()->with('error', 'Sale was not found!');

        if ($sales->status == 'pending') {
            $sales->status = 'confirmed';
            $sales->save();
            return redirect()->back()->with('success', 'Good Job, Fund mark is done!');
        } else {
            $sales->status = 'pending';
            $sales->save();
            return redirect()->back()->with('success', ' Fund is pending!');
        }
    }






//     public function changeStatus($id)
    // {
    //     $changeStatus = sales::select('status')->where('id',$id)->first();
    //     // print($changeStatus);die();
    
    //     if ($changeStatus == 'pending') {
    //         $changeStatus->update(['status' => 'confirmed']);
        
    //         return redirect()->back()->with('success', 'Good Job, Fund mark is done!');

    //     } else {
    //         $changeStatus->update(['status' => 'pending']);

    //         return redirect()->back()->with('success', ' Fund is pending!');
    //     }
        
    // }

}


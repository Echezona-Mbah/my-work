<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class EditController extends Controller
{
    public function edit($id)
    {
        $edit = User::find($id)->first();
        return view('edit')->with('edit',$edit);
    }

    public function update(Request $request, $id){

        $edit = User::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return redirect()->back()->with('status','Student Updated Successfully');
    }

    // return redirect('/edit');
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AgentController extends Controller
{
    public function agent()
    {
        $agent = User::all();
       
        return view('agent',[
            'agent' => $agent
        ]);
    }
}

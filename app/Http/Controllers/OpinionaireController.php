<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpinionaireController extends Controller
{
    public function show()
    {
        return view('users.opinionaire_create' ,["questions"=>[(object)[]]]);
    }

    public function comfirm(Request $request)
    {
        $questions = $request->input("questions");
        return view('users.opinionaire_comfirm' ,["questions"=>$questions]);
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpinionaireController extends Controller
{
    public function show()
    {
        return view('users.opinionaire_create' ,["questions"=>[(object)["items" => [""]]]]);
    }

    public function comfirm(Request $request)
    {
        $title = $request->input('title');
        $questions = $request->input("questions");
        return view('users.opinionaire_comfirm', [
            "title" => $title,
            "questions" => $questions
        ]);
    }

    public function save(Request $request)
    {
        $title = $request->input('title');
        $questions = $request->input("questions");
        

    }
    
}

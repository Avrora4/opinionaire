<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use Illuminate\Support\Facades\Auth;

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

        $q = new Opinionaire;
        //$q->user_id = Auth::id();
        $q->user_id = 1;
        $q->title = $title;
        $q->questions = json_encode($questions);
        $q->save();
        return view('users.opinionaire_complete');
    }
    
}

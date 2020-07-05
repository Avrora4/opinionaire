<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $opinionaire = new Opinionaire;
        $opinionaire->user_id = Auth::id();
        $opinionaire->title = $title;
        $opinionaire->questions = json_encode($questions);
        $opinionaire->save();

        return view('users.opinionaire_complete',[
            "title" => $title,
            "opinionaire" => $opinionaire
        ]);
    }

}

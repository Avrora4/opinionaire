<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpinionaireController extends Controller
{
    public function show(Request $request)
    {
        $title = $request->input('title') ?? "";
        $questions = $request->input('questions') ?? [(object)["items" => [""]]];

        return view('users.opinionaire_create' ,[
            "questions"=>$questions,
            "title" => $title,
            ]);
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

    public function edit(Opinionaire $opinionaire)
    {
        $user = Auth::user();
        if ($opinionaire->user_id != $user->id){
            abort(403, 'Unauthorized action.');
        };

        return view('users.edit', 
        ['user' => $user,
        "title" => $opinionaire->title,
        "opinionaire" => $opinionaire,
        "questions" => $opinionaire->getQuestions(),
    ],
    );
    }

    public function edit_save(Request $request, Opinionaire $opinionaire)
    {
        $user = Auth::user();
        if ($opinionaire->user_id != $user->id){
            abort(403, 'Unauthorized action.');
        };
        
        $title = $request->input('title');
        $questions = $request->input("questions");

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

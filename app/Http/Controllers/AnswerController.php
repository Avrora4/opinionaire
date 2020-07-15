<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Opinionaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function answer($id)
    {
        $opinionaire = Opinionaire::find($id);

        return view('answer.answer',[
            'opinionaire' => $opinionaire,
            'title' => $opinionaire->title,
            'questions' => $opinionaire->getQuestions()
        ]);
    }

    public function comfirm(Request $request,$id)
    {
        $opinionaire = Opinionaire::find($id);

        $answer = $request->input("answers");

        //dd($answer);

        return view('answer.answer_comfirm', [
            'opinionaire' => $opinionaire,
            "answers" => $answer,
            'questions' => $opinionaire->getQuestions()
        ]);
    }

    public function save(Request $request ,$id)
    {
        $opinionaire = Opinionaire::find($id);
        $answers = $request->input("answers");

        $answer = new Answer;
        $answer->answer = json_encode($answers);
        $answer->opinionaire_id = $opinionaire->id;
        $answer->save();

        return view('answer.answer_save',[
            "opinionaire" => $opinionaire
        ]);
    }
}

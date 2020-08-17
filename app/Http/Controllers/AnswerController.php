<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Opinionaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function answer(Opinionaire $opinionaire)
    {
        return view('answer.answer',[
            'opinionaire' => $opinionaire,
            'title' => $opinionaire->title,
            'questions' => $opinionaire->getQuestions()
        ]);
    }

    public function comfirm(Request $request,Opinionaire $opinionaire)
    {
        $answer = $request->input("answers");
        //dd([$answer,$opinionaire->getQuestions()]);

        return view('answer.answer_comfirm', [
            'opinionaire' => $opinionaire,
            "answers" => $answer,
            'questions' => $opinionaire->getQuestions()
        ]);
    }

    public function save(Request $request ,Opinionaire $opinionaire)
    {
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

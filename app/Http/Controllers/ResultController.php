<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpinionaireController extends Controller
{

    public function result(Opinionaire $opinionaire)
    {   
        $result =[];
        foreach(Answer::where("opinionaire_id",$id)->get() as $row){
            $result[] = $row->getAnswers();
        }

        return view('users.opinionaire_result',[
            "opinionaire" => $opinionaire,
            "result" => $result,
            "questions" =>$opinionaire->getQuestions(),
        ]);
    }

}
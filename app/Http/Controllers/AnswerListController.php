<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class AnswerListController extends Controller
{
    public function list()
    {   
        $user = Auth::user();
        $list = [];
        foreach(Opinionaire::where("user_id", $user->id)->get() as $row){
            $list[] = $row;
        }

        return view('AnswerList.list',[
            "opinionaires" => $list,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    public function delete(Opinionaire $opinionaire)
    {
        Answer::where("opinionaire_id", $opinionaire->id)->delete();
        $opinionaire->delete();

        return redirect("/");
    }

    public function result(Opinionaire $opinionaire)
    {   
        $result =[];
        foreach(Answer::where("opinionaire_id", $opinionaire->id)->get() as $row){
            $result[] = $row->getAnswers();
        }

        return view('users.opinionaire_result',[
            "opinionaire" => $opinionaire,
            "result" => $result,
            "questions" =>$opinionaire->getQuestions(),
        ]);
    }

}
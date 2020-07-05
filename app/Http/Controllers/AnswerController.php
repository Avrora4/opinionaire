<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinionaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function choose($id)
    {
        $opinionaire = Opinionaire::find($id);

        return view('answer.choose',['opinionaire' => $opinionaire,
            'title' => $opinionaire->title,
            'questions' => $opinionaire->getQuestions()
        ]);
    }
}

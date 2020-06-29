<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user === NULL){
            
            return redirect('login');
        }

        return view('users.mypage', ['user' => $user] );
    }


}

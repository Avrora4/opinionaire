<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function getAnswers(){
        return json_decode($this->answer,true);
    }
}

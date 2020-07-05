<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinionaire extends Model
{
    public function getQuestions(){
        return json_decode($this->questions,true);
    }
}

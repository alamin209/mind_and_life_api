<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function quizType(){
    	return $this->belongsTo(QuizType::class);
    }

    public function quizquestions(){

    	return $this->hasMany(QuizQuizType::class);
    }
}

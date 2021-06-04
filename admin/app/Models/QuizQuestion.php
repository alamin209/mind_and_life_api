<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
    	'quiz_id',
    	'name',
    	'type',
    	'status',
    ];

    public function quiz(){
    	return $this->belongsTo(Quiz::class);
    }

    public function quizOption(){
    	return $this->hasOne(QuizOption::class,'quiz_question_id','id');
    }
}

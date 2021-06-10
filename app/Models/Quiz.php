<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizType;
use App\Models\QuizQuestion;
class Quiz extends Model
{
    use HasFactory;

    protected $table =  'quiz_questions';


    public function quizType(){

        return $this->belongsTo(QuizType::class ,'quiz_id','id');
    }

    public function questions(){

        return $this->hasMany(QuizQuestion::class ,'quiz_id','id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizType;
use App\Models\QuizQuestion;
use App\Models\CouponQuizEventTag;
class Quiz extends Model
{
    use HasFactory;

    protected $table =  'quizzes';


    public function quizType(){

        return $this->belongsTo(QuizType::class ,'quiz_type_id','id');
    }

    public function questions(){

        return $this->hasMany(QuizQuestion::class ,'quiz_id','id');
    }

    public function quizzed_tag(){

        return $this->hasMany(CouponQuizEventTag::class ,'quiz_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizOption;
class QuizQuestion extends Model
{
    use HasFactory;
    protected $table = 'quiz_questions';


    public function question_options(){

        return $this->hasMany(QuizOption::class ,'quiz_question_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    protected $fillable = [
    	'quiz_id',
        'quiz_question_id',
        'quiz_point',
    	'option_1',
    	'option_2',
    	'option_3',
    	'option_4',
    	'correct_answer',
    ];

    protected $casts = [
    	'correct_answer' => 'array',
    ];

    public function question(){
    	return $this->belongsTo(QuizQuestion::class);
    }
}

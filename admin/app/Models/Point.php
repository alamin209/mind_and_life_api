<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    public function quizType(){
    	return $this->belongsTo(QuizType::class);
    }
}

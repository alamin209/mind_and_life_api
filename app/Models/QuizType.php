<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
class QuizType extends Model
{
    use HasFactory;

    public function quizzed(){

        return $this->hasMany(Quiz::class,'quiz_type_id','id');
    }
}

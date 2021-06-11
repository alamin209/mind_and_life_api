<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Video;
use App\Models\User;
class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article(){
        return $this->belongsTo(Article::class ,'article_id','id');
    }

    public function video(){

        return $this->belongsTo(Video::class ,'video_id','id');
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }


}

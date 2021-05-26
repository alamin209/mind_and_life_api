<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Video;
class ArticleTag extends Model
{
    use HasFactory;
    protected $table = 'article_tags';

    public function article(){

        return $this->belongsTo(Article::class ,'id','article_id');
    }
    public function video(){

        return $this->belongsTo(Video::class ,'id','video_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class ArticleTag extends Model
{
    use HasFactory;
    protected $table = 'article_tags';

    public function article(){

        return $this->belongsTo(Article::class ,'article_id','id');
    }
    public function video(){

        return $this->belongsTo(Article::class ,'article_id','id');
    }
}
